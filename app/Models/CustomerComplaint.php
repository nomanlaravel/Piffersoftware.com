<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_no',
        'complaint_guards_duty',
        'complaint_gaurd_note',
        'complaint_guard_attach',
        'wea_uni_equip',
        'wue_note',
        'complain_month',
        'finance_dept',
        'fd_note',
        'fd_attach',
        'src_complaint',
        'src_note',
        'src_attach',
        'mng_feed',
        'mng_attach',
        'mng_note',
        'complaint_poc_name',
        'complaint_poc_desig',
        'complaint_poc_dept',
        'complaint_poc_email',
        'complaint_poc_contact',
        'complaint_picture',
        'details_complaint',
        'details_attach',
        'complaint_tagged',
        'complaint_arressed',
        'complaint_addressed_attach',
        'complaint_addressed_note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
