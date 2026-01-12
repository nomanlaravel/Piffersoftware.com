<?php

namespace App\Http\Controllers;

use App\Models\Dropdown;
use Illuminate\Http\Request;

class DropdownController extends Controller
{

public function addcctvtype(){
    $cctvtypes = Dropdown::whereNotNull('cctv_type')->get();
     return view('Sales.cctv.type', compact('cctvtypes'));
}
public function storecctvtype(Request $request){
    $cctvtypes = new Dropdown();
    $cctvtypes->cctv_type = $request->cctv_type;
    $cctvtypes->save();
    return redirect()->back()->with('success','Cctv Type  added successfully');
}
public function deletecctvtype($id){
   $cctvtypes = Dropdown::find($id);
   $cctvtypes->delete();
   return redirect()->back()->with('success','Cctv Type deleted successfully');
}



public function addcctvbackupstorage(){
    $cctvbackups = Dropdown::whereNotNull('cctv_backup_storage')->get();
    // return  $cctvbackups;
     return view('Sales.cctv.backup_storage',compact('cctvbackups'));
}

public function storecctvbackupstorage(Request $request){
    $cctvtypes = new Dropdown();
    $cctvtypes->cctv_backup_storage = $request->cctv_backup_storage;
    $cctvtypes->save();
    return redirect()->back()->with('success','Cctv Backup Storage  added successfully');
}
public function deletecctvbackupstorage($id){
    $cctvtypes = Dropdown::find($id);
    $cctvtypes->delete();
    return redirect()->back()->with('success','Cctv Backup Storage deleted successfully');
 }

 public function addcctvnvr(){
    $cctvnvrs = Dropdown::whereNotNull('cctv_nvr')->get();
    // return  $cctvnvrs;
     return view('Sales.cctv.nvr', compact('cctvnvrs'));
}


public function storecctvnvr(Request $request){
    $cctvnvrs = new Dropdown();
    $cctvnvrs->cctv_nvr = $request->cctv_nvr;
    $cctvnvrs->save();
    return redirect()->back()->with('success','Cctv Nvr  added successfully');
}

public function deletecctvnvr($id){
    $cctvnvrs = Dropdown::find($id);
    $cctvnvrs->delete();
    return redirect()->back()->with('success','Cctv Nvr deleted successfully');
 }




 public function addcctvpoeswitch(){
    $cctvpoes = Dropdown::whereNotNull('cctv_poe_switch')->get();
    // return  $cctvnvrs;
     return view('Sales.cctv.poe_switch', compact('cctvpoes'));
}

public function storecctvpoeswitch(Request $request){
    $cctvnvrs = new Dropdown();
    $cctvnvrs->cctv_poe_switch = $request->cctv_poe_switch;
    $cctvnvrs->save();
    return redirect()->back()->with('success','Cctv Poe Switch added successfully');
}

public function deletecctpoeswitch($id){
    $cctvnvrs = Dropdown::find($id);
    $cctvnvrs->delete();
    return redirect()->back()->with('success','Cctv Poe Switch  deleted successfully');
 }


 public function addattendencemachinecategory(){
    $attenmachcates = Dropdown::whereNotNull('attendence_machine_category')->get();
    // return  $cctvnvrs;
     return view('Sales.attendence_machine_category', compact('attenmachcates'));
}

public function storeattendencemachinecategory(Request $request){
    $attenmachcates = new Dropdown();
    $attenmachcates->attendence_machine_category = $request->attendence_machine_category;
    $attenmachcates->save();
    return redirect()->back()->with('success','attendence machine category added successfully');
}

public function deleteattendencemachinecategory($id){
    $attenmachcates = Dropdown::find($id);
    $attenmachcates->delete();
    return redirect()->back()->with('success','attendence machine category  deleted successfully');
 }

 public function addcomercialcategory(){
    $commercialscategorys = Dropdown::whereNotNull('comercial_category')->get();
    // return  $cctvnvrs;
     return view('Sales.dropowns.commercials_category', compact('commercialscategorys'));
}

public function storecomercialcategory(Request $request){
    $attenmachcates = new Dropdown();
    $attenmachcates->comercial_category = $request->comercial_category;
    $attenmachcates->save();
    return redirect()->back()->with('success','Commercial category added successfully');
}
public function deletecomercialcategory($id){
    $attenmachcates = Dropdown::find($id);
    $attenmachcates->delete();
    return redirect()->back()->with('success','Commercial category  deleted successfully');
 }


 public function addcomercialregion(){
    $commercialsregions = Dropdown::whereNotNull('commercial_region')->get();
     return view('Sales.dropowns.commercials_region', compact('commercialsregions'));
}

public function storecomercialregion(Request $request){
    $commercialsregions = new Dropdown();
    $commercialsregions->commercial_region = $request->commercial_region;
    $commercialsregions->save();
    return redirect()->back()->with('success','Commercial Region added successfully');
}

public function deletecomercialregion($id){
    $commercialsregions = Dropdown::find($id);
    $commercialsregions->delete();
    return redirect()->back()->with('success','Commercial Region  deleted successfully');
 }

 public function addcomercialreversecategory(){
    $commercialsrevercategorys = Dropdown::whereNotNull('comercial_reverse_category')->get();
     return view('Sales.dropowns.commercials_reverse_category', compact('commercialsrevercategorys'));
}


public function storecomercialreversecategory(Request $request){
    $commercialsrevercategorys = new Dropdown();
    $commercialsrevercategorys->comercial_reverse_category = $request->comercial_reverse_category;
    $commercialsrevercategorys->save();
    return redirect()->back()->with('success','Commercial Reverse Category added successfully');
}

public function deletecomercialreversecategory($id){
    $commercialsrevercategorys = Dropdown::find($id);
    $commercialsrevercategorys->delete();
    return redirect()->back()->with('success','Commercial Reverse Category  deleted successfully');
 }


 public function addcomercialcomplainscategory(){
    $commercialscomplainscategorys = Dropdown::whereNotNull('comaplains_category')->get();
     return view('Sales.dropowns.comaplains_category', compact('commercialscomplainscategorys'));
}

public function storecomercialcomplainscategory(Request $request){
    $commercialscomplainscategorys = new Dropdown();
    $commercialscomplainscategorys->comaplains_category = $request->comaplains_category;
    $commercialscomplainscategorys->save();
    return redirect()->back()->with('success','Commercial Complains Category added successfully');
}

public function deletecomercialcomplainscategory($id){
    $commercialsrevercategorys = Dropdown::find($id);
    $commercialsrevercategorys->delete();
    return redirect()->back()->with('success','Commercial Complains Category  deleted successfully');
 }




 public function addcomerciallumsumshowncategory(){
    $commercialslumsumcategorys = Dropdown::whereNotNull('lumsumshown_category')->get();
     return view('Sales.dropowns.lumsumshownit', compact('commercialslumsumcategorys'));
}

public function storecomerciallumsumshowncategory(Request $request){
    $commercialslumsumcategorys = new Dropdown();
    $commercialslumsumcategorys->lumsumshown_category = $request->lumsumshown_category;
    $commercialslumsumcategorys->save();
    return redirect()->back()->with('success','Commercial lump sum Category added successfully');
}


public function deletecomerciallumsumshowncategory($id){
    $commercialslumsumcategorys = Dropdown::find($id);
    $commercialslumsumcategorys->delete();
    return redirect()->back()->with('success','Commercial lump sum Category  deleted successfully');
 }


 public function addcomerciallumsumhiddencategory(){
    $commercialslumsumhiddencategorys = Dropdown::whereNotNull('lumsumhidden_category')->get();
     return view('Sales.dropowns.lumsumhiddenit', compact('commercialslumsumhiddencategorys'));
}

public function storecomerciallumsumhiddencategory(Request $request){
    $commercialslumsumhiddencategorys = new Dropdown();
    $commercialslumsumhiddencategorys->lumsumhidden_category = $request->lumsumhidden_category;
    $commercialslumsumhiddencategorys->save();
    return redirect()->back()->with('success','Commercial lump sum Category added successfully');
}

    public function webservilancecategory(){
    $webservilancecategorys = Dropdown::whereNotNull('web_servilance_category')->get();
     return view('Sales.dropowns.webservilancecategory', compact('webservilancecategorys'));
}

    public function webservilancecategorystore(Request $request){
    $webservilancecategorys = new Dropdown();
    $webservilancecategorys->web_servilance_category = $request->web_servilance_category;
    $webservilancecategorys->save();
    return redirect()->back()->with('success','Category added successfully');
}

    public function webservilancecategorydelete($id){
    $webservilancecategorys = Dropdown::find($id);
    $webservilancecategorys->delete();
    return redirect()->back()->with('success','Category  deleted successfully');
 }

}
