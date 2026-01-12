<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount_paid',
        'type_of_payment',
        'ins_no',
        'voucher_no',
        'payment_date',
        'token_note'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admins_id');
    }
}
