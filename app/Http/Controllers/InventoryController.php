<?php

namespace App\Http\Controllers;

use App\Models\Hrm;
use Illuminate\Http\Request;
use App\Models\InventoryArticle;
use App\Models\InventoryCategory;
use App\Models\InventoryReceived;
use Illuminate\Support\Facades\Log;
use App\Models\InventorySubcategory;
use App\Models\Vendor;

class InventoryController extends Controller
{

    public function dashboard(){
        return view('inventory.dashboard');
    }

    public function inventory(){
        //  return 2345;
        $articles = InventoryArticle::all();
        $categories = InventoryCategory::all();
        $subcategories = InventorySubCategory::all();
        $hrmData = Hrm::all();
         $vendors = Vendor::all();
        return view('inventory.inventory-received-submission' , compact('articles','categories','subcategories','hrmData','vendors'));
    }





    public function inventoryCategory(){
        $categories = InventoryCategory::all();
        return view('inventory.inventory-category' , compact('categories'));
    }

    public function inventoryCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $destinationPath = 'categories';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $imagePath = $destinationPath . '/' . $fileName;
        }

        $category = new InventoryCategory();
        $category->category_name = $validatedData['category_name'];
        $category->category_image = $imagePath;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    // SubCategories
    public function inventorySubCategory(){
        $categories = InventoryCategory::with('subcategories')->get();
        return view('inventory.inventory-subcategory' , compact('categories'));
    }

    public function inventorySubCategoryStore(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:inventory_categories,id',
            'subcategory_name' => 'required|string|max:255',
            'subcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('subcategory_image')) {
            $file = $request->file('subcategory_image');
            $destinationPath = 'subcategories';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $imagePath = $destinationPath . '/' . $fileName;
        }

        $subcategory = new InventorySubcategory();
        $subcategory->subcategory_name = $validatedData['subcategory_name'];
        $subcategory->subcategory_image = $imagePath;
        $subcategory->category_id = $validatedData['category_id'];
        $subcategory->save();

        return redirect()->back()->with('success', 'Subcategory created successfully!');
    }

    //Articles
    public function inventoryArticle(){

        $articles = InventoryArticle::all();
        $subcategories = InventorySubCategory::all();
        return view('inventory.inventory-articles' , compact('articles', 'subcategories'));
    }

    public function inventoryArticleStore(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_id' => 'required|exists:inventory_subcategories,id',
            'article_name' => 'required|string|max:255',
            'article_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('article_image')) {
            $file = $request->file('article_image');
            $destinationPath = 'articles';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $fileName);
            $imagePath = $destinationPath . '/' . $fileName;
        }

        $article = new InventoryArticle();
        $article->article_name = $validatedData['article_name'];
        $article->article_image = $imagePath;
        $article->subcategory_id = $validatedData['subcategory_id'];
        $article->save();

        return redirect()->back()->with('success', 'Article created successfully!');
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = InventorySubcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function getArticles($subcategoryId)
    {
        $articles = InventoryArticle::where('subcategory_id', $subcategoryId)->get();
        return response()->json($articles);
    }

    public function getLatestLotNumber()
    {
        // Get the latest lot number from the database
        $latestLot = InventoryReceived::latest('created_at')->first();

        // Generate the new lot number
        $lastLotNumber = $latestLot ? $latestLot->lot_number : 'R000';

        return response()->json(['lastLotNumber' => $lastLotNumber]);
    }


        public function InventoryReceived(){
        $receiveds = InventoryReceived::all();
        return view('inventory.inventory-received' , compact('receiveds'));
    }

    public function inventroysaveEntries(Request $request)
{
    // Uncomment below line for debugging
    // return $request->all();

    try {
        $request->validate([
            'summarized_lots' => 'required|json',
            'po_attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'invoice_attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'ins_attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $lots = json_decode($request->input('summarized_lots'), true);
        if (!is_array($lots)) {
            return response()->json(['status' => 'error', 'message' => 'Invalid summarized_lots JSON format'], 400);
        }

        foreach ($lots as $lotData) {
            $dispatch = new InventoryReceived();
             $dispatch->vendor_id = $lotData['vendor_id'] ?? null;
            $dispatch->lot_number = $lotData['lot_number'] ?? null;
            $dispatch->category = $lotData['category'] ?? null;
            $dispatch->sub_category = $lotData['sub_category'] ?? null;
            $dispatch->article_name = $lotData['article_name'] ?? null;
            $dispatch->condition = $lotData['condition'] ?? null;
            $dispatch->date = !empty($lotData['date']) ? $lotData['date'] : null;
            $dispatch->item_name = $lotData['item_name'] ?? null;
            $dispatch->item_code = $lotData['item_code'] ?? null;
            $dispatch->description = $lotData['description'] ?? null;
            $dispatch->manufacturing = $lotData['manufacturing'] ?? null;
            $dispatch->size = $lotData['size'] ?? null;
            $dispatch->article_number = $lotData['article_number'] ?? null;
            $dispatch->quantity = is_numeric($lotData['quantity']) ? $lotData['quantity'] : null;
            $dispatch->price_per_unit = is_numeric($lotData['price_per_unit']) ? $lotData['price_per_unit'] : null;
            $dispatch->total_price = is_numeric($lotData['total_price']) ? $lotData['total_price'] : null;
            $dispatch->purchase_order_number = $lotData['purchase_order_number'] ?? null;
            $dispatch->vendor_lot_number = $lotData['vendor_lot_number'] ?? null;
            $dispatch->vendor_name = $lotData['vendor_name'] ?? null;
            $dispatch->vendor_id = $lotData['vendor_id'] ?? null;
            $dispatch->invoice_number = $lotData['invoice_number'] ?? null;
            $dispatch->any_spec_ins = $lotData['any_spec_ins'] ?? null;
            $dispatch->notes = $lotData['notes'] ?? null;

            // Attachments (same for all lots, assumed outside summarized_lots)
            if ($request->hasFile('po_attachment')) {
                $file = $request->file('po_attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inventory_received'), $filename);
                $dispatch->po_attachment = $filename;
            }

            if ($request->hasFile('invoice_attachment')) {
                $file = $request->file('invoice_attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inventory_received'), $filename);
                $dispatch->invoice_attachment = $filename;
            }

            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inventory_received'), $filename);
                $dispatch->attachment = $filename;
            }

            if ($request->hasFile('ins_attachment')) {
                $file = $request->file('ins_attachment');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('inventory_received'), $filename);
                $dispatch->ins_attachment = $filename;
            }

            $dispatch->save();



                // 🔻 Decrease quantity in InventoryReceived
                if (!empty($dispatch->lot_number)) {
                    $inventory = \App\Models\InventoryReceived::where('lot_number', $dispatch->lot_number)->first();
                    if ($inventory) {
                        $inventory->quantity = max(0, $inventory->quantity - $dispatch->quantity);
                        $inventory->save();
                    }
                }
        }

        return redirect()->route('inventory.received')->with('success', 'Successfully saved lot(s)');
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
    }
}


    public function InventoryReceiveddelete($id){
     $inventory = InventoryReceived::find($id);
     $inventory->delete();
     return redirect()->back()->with('success','Deleted successfully');
    }

}
