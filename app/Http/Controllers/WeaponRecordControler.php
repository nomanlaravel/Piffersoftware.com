<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\UniformRecord;
use App\Models\WeaponRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeaponRecordControler extends Controller
{
    public function weakly_recordes()
    {
       $records = WeaponRecord::with('Wbranch')->get();
    // Calculate totals
    $totals = [
        'repeater' => $records->sum('repeater'),
        'body_guard' => $records->sum('body_guard'),
        'wooden_body' => $records->sum('wooden_body'),
        'g3_style' => $records->sum('g3_style'),
        'bore12_total_bullets' => $records->sum('bore12_total_bullets'),
        'bore12_total' => $records->sum('bore12_total'),
        'seven_shots' => $records->sum('seven_shots'),
        'fourteen_shots' => $records->sum('fourteen_shots'),
        'mp5' => $records->sum('mp5'),
        'kalakov' => $records->sum('kalakov'),
        'bore30_total_bullets' => $records->sum('bore30_total_bullets'),
        'bore30_total' => $records->sum('bore30_total'),
        'mp_5' => $records->sum('mp_5'),
        'zagana' => $records->sum('zagana'),
        'breta' => $records->sum('breta'),
        'glock' => $records->sum('glock'),
        'mm9_total_bullets' => $records->sum('mm9_total_bullets'),
        'mm9_total' => $records->sum('mm9_total'),
        'mm7_standard' => $records->sum('mm7_standard'),
        'mm7_total_bullets' => $records->sum('mm7_total_bullets'),
        'rifle_222' => $records->sum('rifle_222'),
        'rifle_222_bullets' => $records->sum('rifle_222_bullets'),
        'rifle_44' => $records->sum('rifle_44'),
        'rifle_44_bullets' => $records->sum('rifle_44_bullets'),
        'rifle_223' => $records->sum('rifle_223'),
        'rifle_223_bullets' => $records->sum('rifle_223_bullets'),
        'rifle_223_m4' => $records->sum('rifle_223_m4'),
        'rifle_223_m4_bullets' => $records->sum('rifle_223_m4_bullets'),
    ];
    $uniformbranches = UniformRecord::with('Ubranch')->get();

    return view('admin.weapons.index', compact('records', 'totals','uniformbranches'));
        
    }

    public function postweakly_recordes()
    {

        $admins = Admin::all();
        return view('admin.weapons.create',compact('admins'));
    }

    public function storeweakly_recordes(Request $request)
    {
        // Define base validation rules
        $rules = [
            'date' => 'required|date',
            'branch_id' => 'required|exists:admins,id',
            'weapon_type' => 'required|in:12_bore,30_bore,9mm_pistol,7mm_rifle,222_bore_rifle,44_bore_rifle,223_bore_rifle,223_m4_rifle,all',
        ];

        // Add validation rules based on weapon type
        if ($request->weapon_type === 'all') {
            // Validate all fields for all weapon types
            $rules = array_merge($rules, [
                'repeater' => 'nullable|integer|min:0',
                'body_guard' => 'nullable|integer|min:0',
                'wooden_body' => 'nullable|integer|min:0',
                'g3_style' => 'nullable|integer|min:0',
                'bore12_total_bullets' => 'nullable|integer|min:0',
                'bore12_total' => 'nullable|integer|min:0',
                'seven_shots' => 'nullable|integer|min:0',
                'fourteen_shots' => 'nullable|integer|min:0',
                'mp5' => 'nullable|integer|min:0',
                'kalakov' => 'nullable|integer|min:0',
                'bore30_total_bullets' => 'nullable|integer|min:0',
                'bore30_total' => 'nullable|integer|min:0',
                'mp_5' => 'nullable|integer|min:0',
                'zagana' => 'nullable|integer|min:0',
                'breta' => 'nullable|integer|min:0',
                'glock' => 'nullable|integer|min:0',
                'mm9_total_bullets' => 'nullable|integer|min:0',
                'mm9_total' => 'nullable|integer|min:0',
                'mm7_standard' => 'nullable|integer|min:0',
                'mm7_total_bullets' => 'nullable|integer|min:0',
                'rifle_222' => 'nullable|integer|min:0',
                'rifle_222_bullets' => 'nullable|integer|min:0',
                'rifle_44' => 'nullable|integer|min:0',
                'rifle_44_bullets' => 'nullable|integer|min:0',
                'rifle_223' => 'nullable|integer|min:0',
                'rifle_223_bullets' => 'nullable|integer|min:0',
                'rifle_223_m4' => 'nullable|integer|min:0',
                'rifle_223_m4_bullets' => 'nullable|integer|min:0',
            ]);
        } else {
            // Validate fields for specific weapon type
            switch ($request->weapon_type) {
                case '12_bore':
                    $rules = array_merge($rules, [
                        'repeater' => 'nullable|integer|min:0',
                        'body_guard' => 'nullable|integer|min:0',
                        'wooden_body' => 'nullable|integer|min:0',
                        'g3_style' => 'nullable|integer|min:0',
                        'bore12_total_bullets' => 'nullable|integer|min:0',
                        'bore12_total' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '30_bore':
                    $rules = array_merge($rules, [
                        'seven_shots' => 'nullable|integer|min:0',
                        'fourteen_shots' => 'nullable|integer|min:0',
                        'mp5' => 'nullable|integer|min:0',
                        'kalakov' => 'nullable|integer|min:0',
                        'bore30_total_bullets' => 'nullable|integer|min:0',
                        'bore30_total' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '9mm_pistol':
                    $rules = array_merge($rules, [
                        'mp_5' => 'nullable|integer|min:0',
                        'zagana' => 'nullable|integer|min:0',
                        'breta' => 'nullable|integer|min:0',
                        'glock' => 'nullable|integer|min:0',
                        'mm9_total_bullets' => 'nullable|integer|min:0',
                        'mm9_total' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '7mm_rifle':
                    $rules = array_merge($rules, [
                        'mm7_standard' => 'nullable|integer|min:0',
                        'mm7_total_bullets' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '222_bore_rifle':
                    $rules = array_merge($rules, [
                        'rifle_222' => 'nullable|integer|min:0',
                        'rifle_222_bullets' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '44_bore_rifle':
                    $rules = array_merge($rules, [
                        'rifle_44' => 'nullable|integer|min:0',
                        'rifle_44_bullets' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '223_bore_rifle':
                    $rules = array_merge($rules, [
                        'rifle_223' => 'nullable|integer|min:0',
                        'rifle_223_bullets' => 'nullable|integer|min:0',
                    ]);
                    break;
                case '223_m4_rifle':
                    $rules = array_merge($rules, [
                        'rifle_223_m4' => 'nullable|integer|min:0',
                        'rifle_223_m4_bullets' => 'nullable|integer|min:0',
                    ]);
                    break;
            }
        }

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new weapon record
        $weaponRecord = new WeaponRecord();
        $weaponRecord->date = $request->date;
        $weaponRecord->branch_id = $request->branch_id;
        $weaponRecord->weapon_type = $request->weapon_type;

        // Assign fields based on weapon type
        if ($request->weapon_type === 'all') {
            // Assign all fields for all weapon types
            $weaponRecord->repeater = $request->repeater;
            $weaponRecord->body_guard = $request->body_guard;
            $weaponRecord->wooden_body = $request->wooden_body;
            $weaponRecord->g3_style = $request->g3_style;
            $weaponRecord->bore12_total_bullets = $request->bore12_total_bullets;
            $weaponRecord->bore12_total = $request->bore12_total;
            $weaponRecord->seven_shots = $request->seven_shots;
            $weaponRecord->fourteen_shots = $request->fourteen_shots;
            $weaponRecord->mp5 = $request->mp5;
            $weaponRecord->kalakov = $request->kalakov;
            $weaponRecord->bore30_total_bullets = $request->bore30_total_bullets;
            $weaponRecord->bore30_total = $request->bore30_total;
            $weaponRecord->mp_5 = $request->mp_5;
            $weaponRecord->zagana = $request->zagana;
            $weaponRecord->breta = $request->breta;
            $weaponRecord->glock = $request->glock;
            $weaponRecord->mm9_total_bullets = $request->mm9_total_bullets;
            $weaponRecord->mm9_total = $request->mm9_total;
            $weaponRecord->mm7_standard = $request->mm7_standard;
            $weaponRecord->mm7_total_bullets = $request->mm7_total_bullets;
            $weaponRecord->rifle_222 = $request->rifle_222;
            $weaponRecord->rifle_222_bullets = $request->rifle_222_bullets;
            $weaponRecord->rifle_44 = $request->rifle_44;
            $weaponRecord->rifle_44_bullets = $request->rifle_44_bullets;
            $weaponRecord->rifle_223 = $request->rifle_223;
            $weaponRecord->rifle_223_bullets = $request->rifle_223_bullets;
            $weaponRecord->rifle_223_m4 = $request->rifle_223_m4;
            $weaponRecord->rifle_223_m4_bullets = $request->rifle_223_m4_bullets;
        } else {
            // Assign fields for specific weapon type
            switch ($request->weapon_type) {
                case '12_bore':
                    $weaponRecord->repeater = $request->repeater;
                    $weaponRecord->body_guard = $request->body_guard;
                    $weaponRecord->wooden_body = $request->wooden_body;
                    $weaponRecord->g3_style = $request->g3_style;
                    $weaponRecord->bore12_total_bullets = $request->bore12_total_bullets;
                    $weaponRecord->bore12_total = $request->bore12_total;
                    break;
                case '30_bore':
                    $weaponRecord->seven_shots = $request->seven_shots;
                    $weaponRecord->fourteen_shots = $request->fourteen_shots;
                    $weaponRecord->mp5 = $request->mp5;
                    $weaponRecord->kalakov = $request->kalakov;
                    $weaponRecord->bore30_total_bullets = $request->bore30_total_bullets;
                    $weaponRecord->bore30_total = $request->bore30_total;
                    break;
                case '9mm_pistol':
                    $weaponRecord->mp_5 = $request->mp_5;
                    $weaponRecord->zagana = $request->zagana;
                    $weaponRecord->breta = $request->breta;
                    $weaponRecord->glock = $request->glock;
                    $weaponRecord->mm9_total_bullets = $request->mm9_total_bullets;
                    $weaponRecord->mm9_total = $request->mm9_total;
                    break;
                case '7mm_rifle':
                    $weaponRecord->mm7_standard = $request->mm7_standard;
                    $weaponRecord->mm7_total_bullets = $request->mm7_total_bullets;
                    break;
                case '222_bore_rifle':
                    $weaponRecord->rifle_222 = $request->rifle_222;
                    $weaponRecord->rifle_222_bullets = $request->rifle_222_bullets;
                    break;
                case '44_bore_rifle':
                    $weaponRecord->rifle_44 = $request->rifle_44;
                    $weaponRecord->rifle_44_bullets = $request->rifle_44_bullets;
                    break;
                case '223_bore_rifle':
                    $weaponRecord->rifle_223 = $request->rifle_223;
                    $weaponRecord->rifle_223_bullets = $request->rifle_223_bullets;
                    break;
                case '223_m4_rifle':
                    $weaponRecord->rifle_223_m4 = $request->rifle_223_m4;
                    $weaponRecord->rifle_223_m4_bullets = $request->rifle_223_m4_bullets;
                    break;
            }
        }

        // Save the record
        $weaponRecord->save();

        return redirect()->route('weakly.recordes')
            ->with('success', 'Weapon record saved successfully.');
    }

    public function deleteweakly_recordes($id)
    {
        $weaponRecord = WeaponRecord::findOrFail($id);
        $weaponRecord->delete();    
        return redirect()->route('weakly.recordes')
            ->with('success', 'Weapon record deleted successfully.');
    }




}

