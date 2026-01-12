<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Segment;
use App\Models\Dispatching;
class RegionController extends Controller
{
   public function addregion(){
        $regions = Region::all();
         return view('Sales.region',compact('regions'));
   }
   public function storeregion(Request $request){
        $regions = new Region();
        $regions->region_name = $request->region_name;
        $regions->save();
        return redirect()->back()->with('success','Region added successfully');
   }
   
   public function deleteeregion($id){
       $regions = Region::find($id);
       $regions->delete();
       return redirect()->back()->with('success','Region deleted successfully');
   }
   
    public function addsegment(){
        $segments= Segment::all();
         return view('Sales.segment',compact('segments'));
   }
   public function storesegment(Request $request){
     
        $segments = new Segment();
        $segments->segment_name = $request->segment_name;
        //   return $segments;
        $segments->save();
        return redirect()->back()->with('success','Segment added successfully');
   }
   
       public function deleteesegment($id){
           $segments = Segment::find($id);
           $segments->delete();
           return redirect()->back()->with('success','Segment deleted successfully');
       }
       
         public function adddispatch(){
            $dispatchs= Dispatching::all();
             return view('Sales.dispatch',compact('dispatchs'));
       }
       public function storedispatch(Request $request){
         
            $dispatchs = new Dispatching();
            $dispatchs->dispatch_name = $request->dispatch_name;
            //   return $segments;
            $dispatchs->save();
            return redirect()->back()->with('success','Dispatch added successfully');
       }
       
       public function deleteedispatch($id){
           $dispatchs = Dispatching::find($id);
           $dispatchs->delete();
           return redirect()->back()->with('success','Dispatch deleted successfully');
       }
}
