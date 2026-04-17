<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'customers_id',
        'feed_client_name',
        'feed_client_poc_name',
        'feed_client_email',
        'feed_client_id',
        'feed_client_site_id',
        'feed_desig',
        'feed_cell',
        'feed_month',
        'feed_date',
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'q6',
        'q7',
        'q8',
        'q9',
        'q10',
        'total_score',
        'feed_company_name',
        'feed_poc_name',
        'feed_comment',
        'feedback_form',
        'feed_email',
        'feed_telephone',
        'feed_signature',
        'feed_received',
        'feed_remarks',
        'feed_attach',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customers_id');
    }
}
