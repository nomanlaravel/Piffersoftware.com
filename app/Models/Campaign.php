<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_number','item_name', 'leader_name', 'leader_employee_no', 'leader_cell_no', 'leader_email_id',
        'start_date', 'end_date', 'reporting_to_name', 'reporting_to_desig', 'reporting_to_cell',
        'reporting_to_email', 'reporting_to_notes', 'reporting_to_attach', 'region', 'item_quantity',
        'item_price', 'item_total_price', 'segment', 'dispatched_to', 'dispatched_signature',
        'list_of_address_attach', 'dispatched_to_notes', 'dispatched_to_attach', 'courier_name',
        'courier_price', 'courier_quantity', 'courier_total_cost', 'compaign_cost', 'no_of_items_return',
        'reason_of_items_return', 'items_return_attach', 'items_return_cost', 'items_return_total_cost',
        'dispatch_by_name', 'dispatch_by_employee', 'dispatch_by_desig', 'dispatch_by_dept',
        'dispatch_by_notes', 'dispatch_by_attach','send_count','received_by','opended_by','customer_files','sedulous_files','training_files','guard_files','score_card'
    ];

    public function branch()
{
    return $this->belongsTo(Admin::class, 'branch_id');
}
}
