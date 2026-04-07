<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'prospectNo',
        'category',
        'rhq',
        'type',
        's_date',
        'e_date',
        'branch_name',
        'branch_code',
        'lis_of_give',
        'orgName',
        'orgType',
        'cash_or_taxable',
        'leadBy',
        'typeLead',
        'srcLead',
        'leadAssignedByName',
        'leadAssignedByphoneNo',
        'leadAssignedByemail',
        'leadAssignedById',
        'leadAssignedToName',
        'leadAssignedTophoneNo',
        'leadAssignedToEmail',
        'leadAssignedToId',
        'leadAssignedToEstdQuan',
        'backendCalculation',
        'reverseCategory',
        'reverseAfterWht',
        'reverseSalary',
        'reverseTotalProfit',
        'reverseRate',
        'reverseGst',
        'reverseProfit',
        'reverseWht',
        'reverseAfterGst',
        'reverseQuantity',
        'doerEmpId',
        'doerName',
        'doerCellNo',
        'doerEmail',
        'observerEmpId',
        'observerName',
        'observerCellNo',
        'observerEmail',
        'approverEmpId',
        'approverName',
        'approverCellNo',
        'approverEmail',
        'visitorEmpId',
        'visitorName',
        'visitorCellNo',
        'visitorEmail',
        'hemet',
        'visitingCardFront',
        'visitingCardBack',
        'srcOfRfq',
        'supportingRfqAttach',
        'rfqDocAttach',
        'commonSerReq',
        'amount',
        'insNo',
        'bankName',
        'screenshotDoc',
        'pubDate',
        'subDate',
        'internalDeadline',
        'bidMoney',
        'cheque',
        'payOrder',
        'demand',
        'guarantee',
        'insGuan',
        'transfer',
        'subProfAttach',
        'rfqSubBy',
        'rfqSubOn',
        'rfqSubVia',
        'tecPro',
        'finPro',
        'tenOpn',
        'listComAttach',
        'byHand',
        'timeSub',
        'subTo',
        'scanRecAttach',
        'viaCourier',
        'nameOfCourier',
        'timeOfDispatching',
        'trackingId',
        'viaEmail',
        'emailtimeSub',
        'email_attachment',
        'anyGrev',
        'grevRelated',
        'grevAttach',
        'bidAmount',
        'bidType',
        'bidBankName',
        'bidInsNo',
        'bidReceived',
        'bidRemarks',
        'bidNotes',
        'bidAttach',
        'location',
        'scdResponse',
        'scdRemarks',
        'dhResponse',
        'dhRemarks',
        'sidRankResponse',
        'sidRankRemarks',
        'sidSalaryResponse',
        'sidSalaryRemarks',
        'sidMonthlyResponse',
        'sidMonthlyRemarks',
        'sidEOBIResponse',
        'sidEOBIRankRemarks',
        'sidSocialResponse',
        'sidSocialRemarks',
        'securityinChargeResponse',
        'securityinChargeRemarks',
        'ssdRankResponse',
        'ssdRankRemarks',
        'ssdSalaryResponse',
        'ssdSalaryRemarks',
        'ssdMonthlyResponse',
        'ssdMonthlyRemarks',
        'ssdEOBIResponse',
        'ssdEOBIRemarks',
        'ssdSocialResponse',
        'ssdSocialRemarks',
        'nssdResponse',
        'nssdRemarks',
        'reverseCategory',
        'reverseAfterWht',
        'sgcdSalaryResponse',
        'sgcdSalaryRemarks',
        'sgcdMonthlyResponse',
        'sgcdMonthlyRemarks',
        'sgcdEOBIResponse',
        'sgcdEOBIRemarks',
        'sgcdSocialResponse',
        'sgcdSocialRemarks',
        'nocgResponse',
        'nocgRemarks',
        'noegResponse',
        'noegRemarks',
        'ffssFreeResponse',
        'ffssFreeRemarks',
        'ffssCostResponse',
        'ffssCostRemarks',
        'ffssFoodResponse',
        'ffssFoodRemarks',
        'abcResponse',
        'abcRemarks',
        'abcBikeResponse',
        'abcBikeRemarks',
        'abcFourResponse',
        'abcFourRemarks',
        'abcVehicleResponse',
        'abcVehicleRemarks',
        'abcRoundsResponse',
        'abcRoundsRemarks',
        'abcFuelResponse',
        'abcFuelRemarks',
        'abcConsumptionResponse',
        'abcConsumptionRemarks',
        'weResponse',
        'weRemarks',
        'checklistNotes',
        'checklistAttach',
        'rem',
        'rem1',
        'rem2',
        'rem3',
        'rem4',
        'rem5',
        'rem6',
        'rem7',
        'rem8',
        'rem9',
        'rem10',
        'rem11',
        'competitorName',
        'competitorRate',
        'noOfGuards',
        'competitorAttach',
        'competitorNotes',
        'type',
    ];

    public function requirementpocs()
    {
        return $this->hasMany(Requirementpoc::class, 'requirements_id');
    }
        public function complainwithreverseworking()
    {
        return $this->hasMany(Requirementpoc::class, 'requirements_id');
    }


    public function requirementaddress()
    {
        return $this->hasMany(Requirementaddress::class, 'requirements_id');
    }

    public function requirementguard()
    {
        return $this->hasMany(Requirementguard::class, 'requirements_id');
    }

    public function requirementvehicle()
    {
        return $this->hasMany(Requirementvehicle::class, 'requirements_id');
    }

    public function requirementcanine()
    {
        return $this->hasMany(Requirementcanine::class, 'requirements_id');
    }

    public function requirementfacilitation()
    {
        return $this->hasMany(requirementfacilitation::class, 'requirements_id');
    }

    public function requirementjet()
    {
        return $this->hasMany(requirementjet::class, 'requirements_id');
    }

    public function requirementevent()
    {
        return $this->hasMany(requirementevent::class, 'requirements_id');
    }

    public function requirementconsultancy()
    {
        return $this->hasMany(requirementconsultancy::class, 'requirements_id');
    }

    public function requirementfire()
    {
        return $this->hasMany(requirementfire::class, 'requirements_id');
    }
    public function requirementotherfire()
    {
        return $this->hasMany(requirementotherfire::class, 'requirements_id');
    }

    public function requirementpassive()
    {
        return $this->hasMany(requirementpassive::class, 'requirements_id');
    }

    public function requirementequipment()
    {
        return $this->hasMany(requirementequipment::class, 'requirements_id');
    }

    public function requirementbarrier()
    {
        return $this->hasMany(requirementequipment::class, 'requirements_id');
    }

    public function requirementcctv()
    {
        return $this->hasMany(requirementcctv::class, 'requirements_id');
    }

    public function requirementattendance()
    {
        return $this->hasMany(requirementattendance::class, 'requirements_id');
    }

    public function requirementweb()
    {
        return $this->hasMany(requirementweb::class, 'requirements_id');
    }

    public function requirementalarm()
    {
        return $this->hasMany(requirementalarm::class, 'requirements_id');
    }

    public function complainesshownwht()
    {
        return $this->hasMany(Complainesshownwht::class, 'requirements_id');
    }

    public function complaineshiddenwht()
    {
        return $this->hasMany(Complaineshiddenwht::class, 'requirements_id');
    }

    public function lumpsumshownwht()
    {
        return $this->hasMany(Lumpsumshownwht::class, 'requirements_id');
    }

    public function lumpsumhiddenwht()
    {
        return $this->hasMany(Lumpsumhiddenwht::class, 'requirements_id');
    }
}
