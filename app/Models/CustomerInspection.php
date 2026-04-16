<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_no',
        'inspection_emp_id',
        'inspection_emp_name',
        'inspection_emp_cell',
        'inspection_emp_dept',
        'inspection_date',
        'inspection_pic',
        'inspection_rem_petr',
        'inspection_note',
        'inspection_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }

    public function answers()
{
    return $this->hasMany(InspectionAnswer::class, 'inspection_form_id');
}

   public function inspectionForms()
{
    return $this->hasMany(InspectionForm::class, 'customer_inspection_id');
}
}
