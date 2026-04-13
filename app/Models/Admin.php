<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rental;
use App\Models\DialyBranchReport;
use App\Models\OfficeInventory;
use App\Models\OfficeBranding;
use App\Models\Moveable;
use App\Models\Customer;
use App\Models\Token;
use App\Models\InsurranceCompany;
use App\Models\TrackerCompany;
use App\Models\Repair;
use App\Models\UsageMovement;
use App\Models\AdminNotification;
use App\Models\Hrm;
use App\Traits\Filterable;
class Admin extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'admins';

    protected $fillable = [
        'office_activation',
        'branch_office_name',
        'branch_type',
        'branch_id',
        'branch_category',
        'branch_ptcl',
        'gm_name',
        'gm_cell',
        'gm_email',
        'dgm_name',
        'dgm_cell',
        'cro_name',
        'cro_cell',
        'cro_ptcl',
        'branch_office_no',
        'branch_building',
        'branch_block',
        'branch_area',
        'branch_city',
        'branch_photo',
        'branch_pin',
        'branch_gps',
        'status'
    ];
public function nationwides()
{
    return $this->hasMany(Wnationwide::class, 'branch_id', 'branch_id');
}
public function WeaponBranch()
{
    return $this->hasMany(WeaponRecord::class, 'branch_id');
}

    public function rentals()
    {
        return $this->hasMany(Rental::class, 'office_name', 'branch_office_name');
    }

    public function reports()
    {
        return $this->hasMany(DialyBranchReport::class, 'admins_id',);
    }

    public function inventories()
    {
        return $this->hasMany(OfficeInventory::class, 'admins_id');
    }

    public function brandings()
    {
        return $this->hasMany(OfficeBranding::class, 'admins_id');
    }

    public function moveables()
    {
        return $this->hasMany(Moveable::class, 'admins_id');
    }

    public function tokens()
    {
        return $this->hasMany(Token::class, 'admins_id');
    }

    public function insurrances()
    {
        return $this->hasMany(InsurranceCompany::class, 'admins_id');
    }

    public function trackers()
    {
        return $this->hasMany(TrackerCompany::class, 'admins_id');
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class, 'admins_id');
    }

    public function usages()
    {
        return $this->hasMany(UsageMovement::class, 'admins_id');
    }

    public function notifications()
    {
        return $this->hasMany(AdminNotification::class, 'admins_id');
    }

   public function hrms()
    {
        return $this->hasMany(Hrm::class);
    }

public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function crosDispatches()
    {
        return $this->hasMany(InternalDispatch::class, 'cro_id');
    }

    public function campaigns()
{
    return $this->hasMany(Campaign::class, 'branch_id');
}

    public function regionReports()
    {
        return $this->hasMany(RegionReport::class, 'admin_id');
    }

}
