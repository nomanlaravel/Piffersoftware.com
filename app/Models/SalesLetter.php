<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_leader_name',
        'letter_employee',
        'letter_cell',
        'letter_email',
        'letter_start_date',
        'letter_end_date',
        'letter_rep_name',
        'letter_rep_desig',
        'letter_rep_cell',
        'letter_rep_email',
        'letter_rep_notes',
        'letter_rep_attach',
        'letter_region',
        'letter_quantity',
        'letter_price',
        'letter_total_price',
        'letter_segment',
        'letter_dispatched',
        'letter_signature',
        'letter_address',
        'letter_notes',
        'letter_attach',
        'letter_courier_name',
        'letter_courier_price',
        'letter_courier_quantity',
        'letter_courier_totalcost',
        'letter_compaign_cost',
        'letter_return',
        'letter_return_reason',
        'salesletter_return_attach',
        'letter_return_cost',
        'letter_return_totalcost',
        'letter_dispatch_name',
        'letter_dispatch_employee',
        'letter_dispatch_desig',
        'letter_dispatch_dept',
        'letter_dispatch_notes',
        'letter_dispatch_attach',
    ];
}
