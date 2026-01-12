<?php

namespace App\Models;

use App\Models\RentalAmount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    protected $fillable = [
        'office_name',
        'rp_no',
        'type',
        'desc',
        'pic',
        'branch',
        'report_to',
        'care_name',
        'care_cell',
        'care_cnic',
        'care_attach',
        'plaza_name',
        'plaza_cell',
        'plaza_bank',
        'plaza_account',
        'plaza_cnic',
        'plaza_attach',
        'inc_name',
        'inc_id',
        'inc_desig',
        'inc_cell',
        'inc_email',
        'inc_atatch',
        'office_no',
        'building',
        'block',
        'area',
        'city',
        'location',
        'photo_b',
        'gps',
        'owner_name',
        'owner_cnic',
        'owner_cell',
        'owner_front',
        'owner_back',
        'owner_bank',
        'owner_acc',
        'owner_acc_no',
        'electric',
        'elec_attach',
        'gas',
        'gas_attach',
        'mov_in',
        'mov_out',
        'last_bill',
        'rental_number',
        'amount_advance',
        'instrument_no',
        'voucher_no',
        'name_bank',
        'rental_pic',
        'rental_notes',

    ];

    public function rentalAmounts()
    {
        return $this->hasMany(RentalAmount::class);

    }
}
