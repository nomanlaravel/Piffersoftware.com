<?php

namespace App\Http\Controllers;

use App\Models\BarrierOwnership;
use App\Models\BarrierRental;
use App\Models\CctvBrand;
use App\Models\CctvCategory;
use App\Models\CctvModel;
use App\Models\CctvPixels;
use App\Models\SecurityEqupCate;
use App\Models\Vehicalcategory;
use App\Models\VehicalType;
use Illuminate\Http\Request;
use App\Models\SalesActivities;
use App\Models\SourceLead;
class SalesController extends Controller
{
    public function sales(){
        return view('Sales.sales');
    }

    public function planning(){
        return view('Sales.planning');
    }


    public function activities()
    {
        $activities = SalesActivities::all();
        return view('Sales.activities', compact('activities'));
    }

    public function postactivity(Request $request)
    {
        $activities = new SalesActivities;
        $activities->activity_name = $request->input('activity_name');
        $activities->save();
        return redirect()->back();
    }


    public function destroyactivity($id)
    {
        $activities = SalesActivities::find($id);

        if ($activities) {
            $activities->delete();
            return redirect()->back()->with('success', 'Activity deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Activity not found.');
        }
    }


     public function addSourceLead(){
        $sourceleads = SourceLead::all();
         return view('Sales.source_lead',compact('sourceleads'));
   }
   public function storeSourceLead(Request $request){
    //   return $request;
        $sourcelead = new SourceLead();
        $sourcelead->lead_name = $request->lead_name;
        $sourcelead->save();
        return redirect()->back()->with('success','SourceLead added successfully');
   }

   public function deleteeSourceLead($id){
       $sourcelead = SourceLead::find($id);
       $sourcelead->delete();
       return redirect()->back()->with('success','SourceLead deleted successfully');
   }


   public function addvehicaltype(){
    $vehicals = VehicalType::all();
     return view('Sales.v_type',data: compact('vehicals'));
}
public function storevehicaltype(Request $request){
//   return $request;
    $vehicals = new VehicalType();
    $vehicals->v_type_name = $request->v_type_name;
    $vehicals->save();
    return redirect()->back()->with('success','vehical  added successfully');
}

public function deleteevehicaltype($id){
   $vehicals = VehicalType::find($id);
   $vehicals->delete();
   return redirect()->back()->with('success','vehical deleted successfully');
}



public function addvehicalcategory(){
    $vehicals_c = Vehicalcategory::all();
     return view(view: 'Sales.c_type',data: compact('vehicals_c'));
}
public function storevehicalcategory(Request $request){

    $vehicals_c = new Vehicalcategory();
    $vehicals_c->v_category_name = $request->v_category_name;
    // return $vehicals_c;
    $vehicals_c->save();
    return redirect()->back()->with('success','vehical category  added successfully');
}

public function deleteevehicalcategory($id){
   $vehicals_c = Vehicalcategory::find($id);
   $vehicals_c->delete();
   return redirect()->back()->with('success','vehical category deleted successfully');
}


public function addsecurityequcategory(){
    $sec_equ_cates = SecurityEqupCate::all();
     return view(view: 'Sales.sec_equ_cate_type',data: compact('sec_equ_cates'));
}
public function storesecurityequcategory(Request $request){

    $sec_equ_cates = new SecurityEqupCate();
    $sec_equ_cates->security_equ_cate_name = $request->security_equ_cate_name;
    // return $sec_equ_cates;
    $sec_equ_cates->save();
    return redirect()->back()->with('success','security equipment category  added successfully');
}

public function deleteesecurityequcategory($id){
   $sec_equ_cates = SecurityEqupCate::find($id);
   $sec_equ_cates->delete();
   return redirect()->back()->with('success','security equipment category deleted successfully');
}



public function addbarrierownership(){
    $barrireownerships = BarrierOwnership::all();
     return view(view: 'Sales.barrierowner',data: compact('barrireownerships'));
}
public function storebarrierownership(Request $request){

    $barrireownerships = new BarrierOwnership();
    $barrireownerships->bo_name = $request->bo_name;
    // return $sec_equ_cates;
    $barrireownerships->save();
    return redirect()->back()->with('success','Barrier Ownership  added successfully');
}

public function deletebarrierownership($id){
   $barrireownerships = BarrierOwnership::find($id);
   $barrireownerships->delete();
   return redirect()->back()->with('success','Barrier Ownership deleted successfully');
}




public function addbarrierrental(){
    $barrierrentals = BarrierRental::all();
     return view(view: 'Sales.barrierrental',data: compact('barrierrentals'));
}
public function storebarrierrental(Request $request){

    $barrierrentals = new BarrierRental();
    $barrierrentals->br_name = $request->br_name;
    // return $sec_equ_cates;
    $barrierrentals->save();
    return redirect()->back()->with('success','Barrier Rental  added successfully');
}

public function deletebarrierrental($id){
   $barrierrentals = BarrierRental::find($id);
   $barrierrentals->delete();
   return redirect()->back()->with('success','Barrier Rental deleted successfully');
}




// cctv Category
public function addcctvcategory(){
    $cctvcategorys = CctvCategory::all();
     return view(view: 'Sales.cctv.category',data: compact('cctvcategorys'));
}
public function storecctvcategory(Request $request){

    $cctvcategorys = new CctvCategory();
    $cctvcategorys->cc_name = $request->cc_name;
    // return $sec_equ_cates;
    $cctvcategorys->save();
    return redirect()->back()->with('success','Cctv Category  added successfully');
}

public function deletecctvcategory($id){
   $barrierrentals = CctvCategory::find($id);
   $barrierrentals->delete();
   return redirect()->back()->with('success','Cctv Category deleted successfully');
}


// cctv brand

public function addcctvbrand(){
    $cctvbrands = CctvBrand::all();
     return view(view: 'Sales.cctv.brand',data: compact('cctvbrands'));
}
public function storecctvbrand(Request $request){

    $cctvbrands = new CctvBrand();
    $cctvbrands->cb_name = $request->cb_name;
    // return $sec_equ_cates;
    $cctvbrands->save();
    return redirect()->back()->with('success','cctv brand  added successfully');
}

public function deletecctvbrand($id){
   $cctvbrands = CctvBrand::find($id);
   $cctvbrands->delete();
   return redirect()->back()->with('success','cctv brand deleted successfully');
}


public function addcctvmodel(){
    $cctvmodels = CctvModel::all();
     return view(view: 'Sales.cctv.model',data: compact('cctvmodels'));
}
public function storecctvmodel(Request $request){

    $cctvmodels = new CctvModel();
    $cctvmodels->cm_name = $request->cm_name;
    // return $sec_equ_cates;
    $cctvmodels->save();
    return redirect()->back()->with('success','Cctv Models  added successfully');
}

public function deletecctvmodel($id){
   $cctvmodels = CctvModel::find($id);
   $cctvmodels->delete();
   return redirect()->back()->with('success','Cctv Models deleted successfully');
}

public function addcctvpixels(){
    $cctvpixels = CctvPixels::all();
     return view(view: 'Sales.cctv.pixels',data: compact('cctvpixels'));
}
public function storecctvpixels(Request $request){

    $cctvpixels = new CctvPixels();
    $cctvpixels->cp_name = $request->cp_name;
    // return $sec_equ_cates;
    $cctvpixels->save();
    return redirect()->back()->with('success','Cctv Pixels  added successfully');
}
public function deletecctvpixels($id){
   $cctvpixels = CctvPixels::find($id);
   $cctvpixels->delete();
   return redirect()->back()->with('error','Cctv Pixels deleted successfully');
}

}
