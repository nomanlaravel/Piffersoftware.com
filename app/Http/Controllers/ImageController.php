<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function latestlicenseattachment($id)
    {
        $deleted = ImageHelper::deleteSingleImage(
                'allreports',   // Table name
                'id',           // Primary key column
                $id,            // Record ID
                'attachment',   // Column that stores file name
                'sales/'        // Folder inside /public
            );

            if ($deleted) {
                return redirect()->back()->with('success', 'Image deleted successfully.');
            } else {
                return redirect()->back()->with('error', 'Image not found or already deleted.');
            }
    }

public function deleteImage($id, $column)
{
    $allowedColumns = ['picture_of_b', 'v_attach'];

    if (!in_array($column, $allowedColumns)) {
        return redirect()->back()->with('error', 'Invalid image column.');
    }

    $record = DB::table('office_brandings')->where('id', $id)->first();

    if (!$record) {
        return redirect()->back()->with('error', 'Record not found.');
    }

    $filePath = $record->$column;
    // If the image path is empty, nothing to do
    if (!$filePath) {
        return redirect()->back()->with('error', 'No image found in this field.');
    }
    // ✅ Only unlink if the other column is also filled and has the same file path
    foreach ($allowedColumns as $col) {
        if (
            $col !== $column &&
            !empty($record->$col) &&                 // Must not be null or empty
            $record->$col === $filePath              // Must have the same file path
        ) {
            // Just unlink this field, not delete file
            DB::table('office_brandings')->where('id', $id)->update([
                $column => null
            ]);

            return redirect()->back()->with('success', 'Image unlinked successfully (still used by another field).');
        }
    }
    // If not shared, delete completely
    $deleted = ImageHelper::deleteSingleImage(
        'office_brandings',
        'id',
        $id,
        $column,
        'uploads/images'
    );

    if ($deleted) {
        return redirect()->back()->with('success', 'Image deleted successfully!');
    } else {
        return redirect()->back()->with('error', 'Error occurred while deleting the image.');
    }
}

     /* Rental File Images Controller */
    public function deleteRentalImage($id, $column)
        {
            $allowedColumns = ['pic', 'care_attach', 'care_back', 'care_cnic', 'plaza_cnic', 'plaza_back', 'plaza_attach',
        'inc_atatch', 'owner_front', 'owner_back', 'elec_attach', 'gas_attach', 'last_bill', 'rental_pic', 'agreement_attachment'];

            if(!in_array($column, $allowedColumns)) 
            {
                return redirect()->back()->with('error', 'Image not found');
            }

            $record = DB::table('rentals')->where('id', $id)->first();
            if(!$record) {
                return redirect()->back()->with('error', 'No Record are found!');
            }

            $filePath = $record->$column;

            if(!$filePath) {
                return redirect()->back()->with('error', 'No image found in this field.');
            }
            foreach($allowedColumns as $col)
            {
                if(
                    $col !== $column && !empty($record->$col) && $record->$col == $filePath
                ) {
                    DB::table('rentals')->where('id', $id)->update([
                        $column => null
                    ]);
                    return redirect()->back()->with('success', 'Image Deleted Successfully.');
                }
            }

            $deleted = ImageHelper::deleteSingleImage(
                'rentals',
                'id',
                $id,
                $column,
                'uploads/images'
            );

            if($deleted) {
                return redirect()->back()->with('success', 'Image Deleted Successfully.');
            }else{
                return redirect()->back()->with('error', 'While Deleting the Image then find the some error! Try again');
            }
        }

        public function deleteCustomerImage($id, $column)
        {
            $allowedColumns = ['approved_attach', 'quickbooks_attach', 'sum_apr', 'apr_kpi', 'approv_q_s_attach', 'approv_q_c_attach',
        'approv_q_cfo_attach', 'perfom_attach', 'signed_ser_attach', 'com_ins_attach', 'testimonials_attach', 'sales_inc_attach',
        'ntn_fbr', 'poc_photo', 'poc_attach', 'cf_photo', 'cf_attach', 'currency_attach', 'man_equip_attach', 'meeting_attach',
        'meeting_alert_attach', 'meeting_ex_attach', 'meeting_freq_attach'];

            if(!in_array($column, $allowedColumns)) 
            {
                return redirect()->back()->with('error', 'Image not found');
            }

        $record = DB::table('customers')->where('id', $id)->first();
        if(!$record) {
            return redirect()->back()->with('error', 'Image record not found.');
        }

        $filePath = $record->$column;
        if(!$filePath) {
            return redirect()->back()->with('error', 'Image not found.');
        }

        foreach($allowedColumns as $col)
            {
                if(
                    $col !== $column && !empty($record->$col) && $record->$col == $filePath
                ){
                    DB::table('customers')->where('id', $id)->update([
                        $column => null
                    ]);

                    return redirect()->back()->with('success', 'Image deleted successfully.');
                }          
            }
        $deleted =  ImageHelper::deleteSingleImage(
            'customers',
            'id',
            $id,
            $column,
            'uploads/images',
        );
        if($deleted) {
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'While deleting the image then find the some error ! Try Again.');
        }
        }


        public function deleteEmergencyImage($id, $column)
        {
            $allowedColumns = [
                'emer_pic', 'emer_loc', 'emer_poc_attach', 'emer_attach',
            ];
        }

        public function deleteDepartmentImage($id, $column)
        {
            $allowedColumns = [
                'dept_photo', 'dept_attach', 'dept_ex_attach',
            ];
        }

        public function deleteIncptionImage($id, $column)
        {
            $allowedColumns = ['inspection_pic', 'inspection_attach'];
        }

        public function deleteArmourerImage($id, $column)
        {
            $allowedColumns = ['arm_pic_a', 'arm_pic_b', 'arm_cost_bill', 'arm_auth_attach'];
        }

        public function deleteIncidentImage($id, $column)
        {
            $allowedColumns = ['incident_attach'];
        }

        public function deleteAssigmentImage($id, $column)
        {
            $allowedColumns = ['asig_ex_attach'];
        }

        public function deleteAuditImage($id, $column)
        {
            $allowedColumns = ['audit_attach', 'audit_ex_attach'];
        }

        public function deleteBusniessImage($id, $column)
        {
            $allowedColumns = ['bussiness_photo', 'bussiness_attach'];
        }

        public function deleteActivitesImage($id, $column) 
        {
            $allowedColumns = ['promotional_attach'];
        }

        public function deleteFeedbackImage($id, $column)
        {
            $allowedColumns = ['feed_attach'];
        }

        public function deleteComplaintImage($id, $column)
        {
            $allowedColumns = ['complaint_guard_attach', 'fd_attach', 'src_attach', 'mng_attach', 'complaint_picture',
        'details_attach', 'complaint_addressed_attach', ''];
        }

        public function deleteNotificationImage($id, $column)
        {
            $allowedColumns = ['notification_attach', 'notification_ex_attach', ''];
        }
}
