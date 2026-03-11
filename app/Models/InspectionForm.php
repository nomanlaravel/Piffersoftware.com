<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'rider_id',
        'customer_id',
        'submitted_at',
    ];

    /**
     * Get the rider (user) that started the inspection.
     */
    public function rider()
    {
        return $this->belongsTo(User::class, 'rider_id');
    }

    /**
     * Get the customer associated with the inspection.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the answers for the inspection form.
     */
    public function answers()
    {
        return $this->hasMany(InspectionAnswer::class);
    }
}
