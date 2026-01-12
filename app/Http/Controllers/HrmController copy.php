<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Disease;
use App\Models\Education;
use App\Models\Eobi;
use App\Models\Guarantor;
use App\Models\Hrm;
use App\Models\hrmCategory;
use App\Models\Social;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HrmController extends Controller
{
    public function hrm()
    {
        $hrmData = Hrm::with('guarantors')->get();

        return view('Hrm.hrm', compact('hrmData'));
    }

    public function posthrm()
    {
        $branches = Admin::all();
        $categories = hrmCategory::all();
        $diseases = Disease::all();
        $eobis = Eobi::all();
        $socials = Social::all();
        return view('Hrm.posthrm', compact('categories', 'diseases', 'eobis', 'socials', 'branches'));
    }

    public function submit_hrm(Request $request)
    {
        DB::beginTransaction();

        try {
            // Create HRM record
            $hrmData = $request->except('_token');

            // Define the HRM image fields
            $hrmImageFields = [
                'photo', 'cnic_front', 'cnic_back', 'f_attach', 't_attach', 'p_attach',
                'h_verify', 'b_verify', 'p_verify', 'd_book', 'v_verify', 'copy_bill',
                'n_verify', 'insurrance', 'guard_bank', 'bio_verify', 'c_verify', 'dpo_verify',
                'form_attach', 'rec_attach', 'eight_verify', 'sahulat_v', 'l_finger',
                'f_finger', 'm_finger', 'i_finger', 't_finger', 'additionals',
                'f_attachment', 'vaccine_card',
                'medical_fit_card', 'medical_fit_attach', 'phy_attach', 'vac_pr',
                'front_eobi', 'back_eobi', 'front_ss',
                'back_ss', 'snc_pol', 'next_frc', 'next_legal',
                'next_photo', 'next_claim', 'next_copy', 'next_attach', 'ex_next_attach',
                's_front', 's_back', 's_attach', 'insp_pic', 'insp_attach', 'ex_observ_attach',
                'appraisal_attach',
            ];

            foreach ($hrmImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $hrmData[$field] = 'uploads/images/' . $file_name;
                }
            }

            $hrm = Hrm::create($hrmData);

            // Create Guarantor records
            $guarantorData = $request->only([
                'g_name', 'g_fname', 'g_relation', 'g_tenure_rel', 'pos_verify', 'head_office_no',
                'head_floor_no', 'head_building', 'head_block', 'head_area', 'head_city',
            ]);

            $guarantorDataArray = [];
            foreach ($guarantorData['g_name'] as $index => $gName) {
                $guarantorDataRow = [
                    'g_name' => $gName,
                    'g_fname' => $guarantorData['g_fname'][$index],
                    'g_relation' => $guarantorData['g_relation'][$index],
                    'g_tenure_rel' => $guarantorData['g_tenure_rel'][$index],
                    'pos_verify' => $guarantorData['pos_verify'][$index],
                    'head_office_no' => $guarantorData['head_office_no'][$index],
                    'head_floor_no' => $guarantorData['head_floor_no'][$index],
                    'head_building' => $guarantorData['head_building'][$index],
                    'head_block' => $guarantorData['head_block'][$index],
                    'head_area' => $guarantorData['head_area'][$index],
                    'head_city' => $guarantorData['head_city'][$index],
                ];

                // Define the Guarantor image fields
                $guarantorImageFields = [
                    'g_cnic_f', 'g_cnic_b', 'head_attach',
                ];

                foreach ($guarantorImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $guarantorDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $guarantorDataArray[] = $guarantorDataRow;
            }

            $hrm->guarantors()->createMany($guarantorDataArray);

            // Create Work Experience records
            $workExperienceData = $request->only([
                'org_name', 'email_oc', 'poc', 'w_desig', 'w_salary',
                'ser_tenure', 'achivement', 'join_date', 'end_date', 't_exp',
            ]);

            $workExperienceDataArray = [];
            foreach ($workExperienceData['org_name'] as $index => $orgName) {
                $workExperienceDataRow = [
                    'org_name' => $orgName,
                    'email_oc' => $workExperienceData['email_oc'][$index],
                    'poc' => $workExperienceData['poc'][$index],
                    'w_desig' => $workExperienceData['w_desig'][$index],
                    'w_salary' => $workExperienceData['w_salary'][$index],
                    'ser_tenure' => $workExperienceData['ser_tenure'][$index],
                    'achivement' => $workExperienceData['achivement'][$index],
                    'join_date' => $workExperienceData['join_date'][$index],
                    'end_date' => $workExperienceData['end_date'][$index],
                    't_exp' => $workExperienceData['t_exp'][$index],
                ];

                // Define the Work Experience image fields
                $workExperienceImageFields = [
                    'jec', 'jec_attach', 'ser_other',
                ];

                foreach ($workExperienceImageFields as $field) {
                    if ($request->hasFile($field) && isset($request->$field[$index])) {
                        $file = $request->$field[$index];
                        $extension = $file->getClientOriginalExtension();
                        $file_name = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/images'), $file_name);
                        $workExperienceDataRow[$field] = 'uploads/images/' . $file_name;
                    }
                }

                $workExperienceDataArray[] = $workExperienceDataRow;
            }

            $hrm->workExperiences()->createMany($workExperienceDataArray);

            //Create Education
            $educationData = $request->only([
                'degree', 'degree_date', 'institute_name', 'a_body', 'ex_notes',
                'degree_no', 'degree_level', 'ob_marks', 't_marks', 'grade', 'date_start', 'date_end',
                'adress_inst',
            ]);

            $educationDataArray = [];
            foreach ($educationData['degree'] as $index => $degree) {
                $educationDataRow = [
                    'degree' => $degree,
                    'degree_date' => $educationData['degree_date'][$index],
                    'institute_name' => $educationData['institute_name'][$index],
                    'a_body' => $educationData['a_body'][$index],
                    'ex_notes' => $educationData['ex_notes'][$index],
                    'degree_no' => $educationData['degree_no'][$index],
                    'degree_level' => $educationData['degree_level'][$index],
                    'ob_marks' => $educationData['ob_marks'][$index],
                    't_marks' => $educationData['t_marks'][$index],
                    'grade' => $educationData['grade'][$index],
                    'date_start' => $educationData['date_start'][$index],
                    'date_end' => $educationData['date_end'][$index],
                    'adress_inst' => $educationData['adress_inst'][$index],
                ];

                if ($request->hasFile('degree_pic') && isset($request->degree_pic[$index])) {
                    $file = $request->degree_pic[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $educationDataRow['degree_pic'] = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('deg_attach') && isset($request->deg_attach[$index])) {
                    $file = $request->deg_attach[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $educationDataRow['deg_attach'] = 'uploads/images/' . $file_name;
                }

                $educationDataArray[] = $educationDataRow;
            }

            $hrm->education()->createMany($educationDataArray);

            DB::commit();

            Log::info('HRM data successfully stored.');

            return redirect()->back()->with('success', 'HRM data successfully stored.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving HRM data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving data.');
        }
    }

    public function deleteHrm($id)
    {
        DB::beginTransaction();

        try {
            $hrm = Hrm::find($id);

            if (!$hrm) {
                return redirect()->back()->with('error', 'HRM record not found.');
            }

            $hrm->guarantors()->delete();
            $hrm->workExperiences()->delete();
            $hrm->education()->delete();
            $hrm->delete();

            DB::commit();

            return redirect()->route('hrm.index')->with('success', 'HRM record deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while deleting HRM record: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while deleting the HRM record.');
        }
    }

    public function edithrm($id)
    {
        $hrms = Hrm::find($id);
        $guarantorCount = $hrms->guarantors->count();
        return view('Hrm.edithrm', compact('hrms', 'guarantorCount'));
    }

    public function update_hrm(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $hrm = Hrm::findOrFail($id);
            $hrm->update($request->except('_token', '_method'));

            $hrmImageFields = [
                'photo', 'cnic_front', 'cnic_back', 'f_attach', 't_attach', 'p_attach',
                'h_verify', 'b_verify', 'p_verify', 'd_book', 'v_verify', 'copy_bill',
                'n_verify', 'insurrance', 'guard_bank', 'bio_verify', 'c_verify', 'dpo_verify',
                'form_attach', 'rec_attach', 'eight_verify', 'sahulat_v', 'l_finger',
                'f_finger', 'm_finger', 'i_finger', 't_finger', 'additionals',
                'f_attachment', 'vaccine_card',
                'medical_fit_card', 'medical_fit_attach', 'phy_attach', 'vac_pr',
                'front_eobi', 'back_eobi', 'front_ss',
                'back_ss', 'snc_pol', 'next_frc', 'next_legal',
                'next_photo', 'next_claim', 'next_copy', 'next_attach', 'ex_next_attach',
                's_front', 's_back', 's_attach', 'insp_pic', 'insp_attach', 'ex_observ_attach',
                'appraisal_attach',
            ];

            foreach ($hrmImageFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $hrm->$field = 'uploads/images/' . $file_name;
                }
            }

            $hrm->save();

            $guarantorData = $request->only([
                'g_name', 'g_fname', 'g_relation', 'g_tenure_rel', 'pos_verify', 'head_office_no',
                'head_floor_no', 'head_building', 'head_block', 'head_area', 'head_city',
            ]);

            foreach ($guarantorData['g_name'] as $index => $gName) {
                $guarantor = Guarantor::findOrFail($request->input('guarantor_id')[$index]);
                $guarantor->update([
                    'g_name' => $gName,
                    'g_fname' => $guarantorData['g_fname'][$index],
                    'g_relation' => $guarantorData['g_relation'][$index],
                    'g_tenure_rel' => $guarantorData['g_tenure_rel'][$index],
                    'pos_verify' => $guarantorData['pos_verify'][$index],
                    'head_office_no' => $guarantorData['head_office_no'][$index],
                    'head_floor_no' => $guarantorData['head_floor_no'][$index],
                    'head_building' => $guarantorData['head_building'][$index],
                    'head_block' => $guarantorData['head_block'][$index],
                    'head_area' => $guarantorData['head_area'][$index],
                    'head_city' => $guarantorData['head_city'][$index],
                ]);

                // Update Guarantor image fields here if needed
                if ($request->hasFile('g_cnic_f') && isset($request->g_cnic_f[$index])) {
                    $file = $request->g_cnic_f[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $guarantor->g_cnic_f = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('g_cnic_b') && isset($request->g_cnic_b[$index])) {
                    $file = $request->g_cnic_b[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $guarantor->g_cnic_b = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('head_attach') && isset($request->head_attach[$index])) {
                    $file = $request->head_attach[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $guarantor->head_attach = 'uploads/images/' . $file_name;
                }

                $guarantor->save();
            }

            $workExperienceData = $request->only([
                'org_name', 'email_oc', 'poc', 'w_desig', 'w_salary',
                'ser_tenure', 'achivement', 'join_date', 'end_date', 't_exp',
            ]);

            foreach ($workExperienceData['org_name'] as $index => $orgName) {
                $workExperience = Work::findOrFail($request->input('work_experience_id')[$index]);
                $workExperience->update([
                    'org_name' => $orgName,
                    'email_oc' => $workExperienceData['email_oc'][$index],
                    'poc' => $workExperienceData['poc'][$index],
                    'w_desig' => $workExperienceData['w_desig'][$index],
                    'w_salary' => $workExperienceData['w_salary'][$index],
                    'ser_tenure' => $workExperienceData['ser_tenure'][$index],
                    'achivement' => $workExperienceData['achivement'][$index],
                    'join_date' => $workExperienceData['join_date'][$index],
                    'end_date' => $workExperienceData['end_date'][$index],
                    't_exp' => $workExperienceData['t_exp'][$index],
                ]);

                if ($request->hasFile('jec') && isset($request->jec[$index])) {
                    $file = $request->jec[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $workExperience->jec = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('jec_attach') && isset($request->jec_attach[$index])) {
                    $file = $request->jec_attach[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $workExperience->jec_attach = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('ser_other') && isset($request->ser_other[$index])) {
                    $file = $request->ser_other[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $workExperience->ser_other = 'uploads/images/' . $file_name;
                }

                $workExperience->save();
            }

            $educationData = $request->only([
                'degree', 'degree_date', 'institute_name', 'a_body', 'ex_notes',
                'degree_no', 'degree_level', 'ob_marks', 't_marks', 'grade', 'date_start', 'date_end',
                'adress_inst',
            ]);

            foreach ($educationData['degree'] as $index => $degree) {
                $education = Education::findOrFail($request->input('education_id')[$index]);
                $education->update([
                    'degree' => $degree,
                    'degree_date' => $educationData['degree_date'][$index],
                    'institute_name' => $educationData['institute_name'][$index],
                    'a_body' => $educationData['a_body'][$index],
                    'ex_notes' => $educationData['ex_notes'][$index],
                    'degree_no' => $educationData['degree_no'][$index],
                    'degree_level' => $educationData['degree_level'][$index],
                    'ob_marks' => $educationData['ob_marks'][$index],
                    't_marks' => $educationData['t_marks'][$index],
                    'grade' => $educationData['grade'][$index],
                    'date_start' => $educationData['date_start'][$index],
                    'date_end' => $educationData['date_end'][$index],
                    'adress_inst' => $educationData['adress_inst'][$index],
                ]);

                if ($request->hasFile('degree_pic') && isset($request->degree_pic[$index])) {
                    $file = $request->degree_pic[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $education->degree_pic = 'uploads/images/' . $file_name;
                }

                if ($request->hasFile('deg_attach') && isset($request->deg_attach[$index])) {
                    $file = $request->deg_attach[$index];
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/images'), $file_name);
                    $education->deg_attach = 'uploads/images/' . $file_name;
                }

                $education->save();
            }

            DB::commit();

            Log::info('HRM data successfully updated.');

            return redirect()->back()->with('success', 'HRM data successfully updated.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while updating HRM data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating data.');
        }
    }

    //Hrm Categories

    public function hrmcategory()
    {
        $categories = hrmCategory::all();
        return view('Hrm.hrmcategory', compact('categories'));
    }

    public function posthrmcategory(Request $request)
    {
        $categories = new hrmCategory;
        $categories->hrmcategory_name = $request->input('hrmcategory_name');
        $categories->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = HrmCategory::find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = HrmCategory::find($id);
        $category->hrmcategory_name = $request->input('hrmcategory_name');
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = HrmCategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    //Hrm Diseases

    public function disease()
    {
        $diseases = Disease::all();
        return view('Hrm.disease', compact('diseases'));
    }

    public function postdisease(Request $request)
    {
        $disease = new Disease;
        $disease->hrm_disease = $request->input('hrm_disease');
        $disease->save();
        return redirect()->back();
    }

    public function editdisease($id)
    {
        $disease = Disease::find($id);
        return view('diseases.edit', compact('disease'));
    }

    public function updatedisease(Request $request, $id)
    {
        $disease = Disease::find($id);

        if (!$disease) {
            return redirect()->back()->with('error', 'Disease not found.');
        }

        $disease->hrm_disease = $request->input('hrm_disease');
        $disease->save();

        return redirect()->back()->with('success', 'Disease updated successfully');
    }

    public function destroydisease($id)
    {
        $disease = Disease::find($id);

        if ($disease) {
            $disease->delete();
            return redirect()->back()->with('success', 'Disease deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Disease not found.');
        }
    }

    //Hrm Old Age EOBI Cities
    public function eobi()
    {
        $eobiCities = Eobi::all();
        return view('Hrm.eobi', compact('eobiCities'));
    }

    public function posteobi(Request $request)
    {
        $eobis = new Eobi;
        $eobis->eobi_city = $request->input('eobi_city');
        $eobis->save();
        return redirect()->back();
    }

    public function editeobi($id)
    {
        $eobicity = Eobi::find($id);
        return view('eobicities.edit', compact('eobicity'));
    }

    public function updateeobi(Request $request, $id)
    {
        // Update the record
        $eobis = Eobi::find($id);
        if (!$eobis) {
            return redirect()->back()->with('error', 'EOBI City not found.');
        }

        $eobis->eobi_city = $request->input('eobi_city');
        $eobis->save();

        return redirect()->back()->with('success', 'City updated successfully');
    }

    public function destroyeobi($id)
    {
        // Delete the Fall In EOBI City by ID
        $eobicity = Eobi::find($id);
        $eobicity->delete();

        return redirect()->back()->with('success', 'Fall In EOBI City deleted successfully.');
    }

    //Hrm Old Age EOBI Cities (Social Security)
    public function social()
    {
        $socialCities = Social::all();
        return view('Hrm.social', compact('socialCities'));
    }

    public function postsocial(Request $request)
    {
        $socials = new Social;
        $socials->social_city = $request->input('social_city');
        $socials->save();
        return redirect()->back();
    }

    public function editsocial($id)
    {
        $socialCity = Social::find($id);
        return view('social.edit', compact('socialCity'));
    }

    public function updatesocial(Request $request, $id)
    {
        $socialCity = Social::find($id);

        if (!$socialCity) {
            return redirect()->back()->with('error', 'Social City not found.');
        }

        $socialCity->social_city = $request->input('social_city');
        $socialCity->save();

        return redirect()->back()->with('success', 'Social City updated successfully');
    }

    public function destroysocial($id)
    {
        $socialCity = Social::find($id);

        if ($socialCity) {
            $socialCity->delete();
            return redirect()->back()->with('success', 'Social City deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Social City not found.');
        }
    }

}
