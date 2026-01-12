<?php

namespace App\Models;

use App\Models\TrainingAmmunition;
use App\Models\TrainingArmourer;
use App\Models\TrainingBudget;
use App\Models\TrainingEquipments;
use App\Models\TrainingItems;
use App\Models\TrainingWeapons;
use App\Models\TrainingPoc;
use App\Models\Hrm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Training extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'training_activation',
        'type_of_training',
        'training_course_file',
        'venue',
        'name_of_range',
        'training_no',
        'training_region',
        'training_s_date',
        'training_e_date',
        'training_s_time',
        'training_e_time',
        'guest_invitation',
        'reg_date',
        'reg_time',
        'office_no',
        'floor',
        'building',
        'block',
        'area',
        'city',
        'photo',
        'email',
        'website',
        'pin',
        'gps',
        'cro_name',
        'cro_cell',
        'email_cro',
        'organized_by',
        'branch',
        'demo',
        'duration',
        'booking_attach',
        'all_types_covered',
        'reports_submitted',
        'booking_request',
        'range_allocation_attach',
        'booking_request_date',
        'copy_booking_attach',
        'guard_resp_attach',
        'list_guard_attach',
        'email_active_check',
        'send_email_active',
        'email_inactive_check',
        'send_email_inactive',
        'email_all_check',
        'send_email_all',
        'guards_respective',
        'date_allocation_letter',
        'estimated_amount',
        'actual_amount',
        'total_expense',
        'expenses_proof_attach',
        'training_certificate',
        'attachment_anyone',
        'training_notes',
        'general_check',
        'weapon_check',
        'frisking_check',
        'gatehouse_check',
        'optimum_check',
        'radio_check',
        'aid_check',
        'fire_check',
        'self_check',
        'close_check',
        'crime_check',
        'general_video',
        'general_literature',
        'general_trainer_name',
        'general_trainer_desig',
        'general_trainer_email',
        'general_trainer_office',
        'general_trainer_rhq',
        'general_trainer_region',
        'general_trainer_cards',
        'general_guards_cards',
        'weapon_video',
        'weapon_literature',
        'weapon_trainer_name',
        'weapon_trainer_desig',
        'weapon_trainer_email',
        'weapon_trainer_office',
        'weapon_trainer_rhq',
        'weapon_trainer_region',
        'weapon_trainer_cards',
        'weapon_guards_cards',
        'frisking_video',
        'frisking_literature',
        'frisking_trainer_name',
        'frisking_trainer_desig',
        'frisking_trainer_email',
        'frisking_trainer_office',
        'frisking_trainer_rhq',
        'frisking_trainer_region',
        'frisking_trainer_cards',
        'frisking_guards_cards',
        'gatehouse_video',
        'gatehouse_literature',
        'gatehouse_trainer_name',
        'gatehouse_trainer_desig',
        'gatehouse_trainer_email',
        'gatehouse_trainer_office',
        'gatehouse_trainer_rhq',
        'gatehouse_trainer_region',
        'gatehouse_trainer_cards',
        'gatehouse_guards_cards',
        'optimum_video',
        'optimum_literature',
        'optimum_trainer_name',
        'optimum_trainer_desig',
        'optimum_trainer_email',
        'optimum_trainer_office',
        'optimum_trainer_rhq',
        'optimum_trainer_region',
        'optimum_trainer_cards',
        'optimum_guards_cards',
        'radio_video',
        'radio_literature',
        'radio_trainer_name',
        'radio_trainer_desig',
        'radio_trainer_email',
        'radio_trainer_office',
        'radio_trainer_rhq',
        'radio_trainer_region',
        'radio_trainer_cards',
        'radio_guards_cards',
        'firstaid_video',
        'firstaid_literature',
        'firstaid_trainer_name',
        'firstaid_trainer_desig',
        'firstaid_trainer_email',
        'firstaid_trainer_office',
        'firstaid_trainer_rhq',
        'firstaid_trainer_region',
        'firstaid_trainer_cards',
        'firstaid_guards_cards',
        'fire_video',
        'fire_literature',
        'fire_trainer_name',
        'fire_trainer_desig',
        'fire_trainer_email',
        'fire_trainer_office',
        'fire_trainer_rhq',
        'fire_trainer_region',
        'fire_trainer_cards',
        'fire_guards_cards',
        'self_video',
        'self_literature',
        'self_trainer_name',
        'self_trainer_desig',
        'self_trainer_email',
        'self_trainer_office',
        'self_trainer_rhq',
        'self_trainer_region',
        'self_trainer_cards',
        'self_guards_cards',
        'close_video',
        'close_literature',
        'close_trainer_name',
        'close_trainer_desig',
        'close_trainer_email',
        'close_trainer_office',
        'close_trainer_rhq',
        'close_trainer_region',
        'close_trainer_cards',
        'close_guards_cards',
        'crime_video',
        'crime_literature',
        'crime_trainer_name',
        'crime_trainer_desig',
        'crime_trainer_email',
        'crime_trainer_office',
        'crime_trainer_rhq',
        'crime_trainer_region',
        'crime_trainer_cards',
        'crime_guards_cards',
        'first_aid_check',
        'first_aid_quantity',
        'umbrella_check',
        'umbrella_quantity',
        'wireless_check',
        'wireless_quantity',
        'mega_check',
        'mega_phone_quantity',
        'sofa_check',
        'sofas_quantity',
        'water_check',
        'watercooler_quantity',
        'media_attach',
        'media_notes',
        'media_attach_2',
        'estimated_amount_loi',
        'nearest_hospital',
        'hospital_floor',
        'hospital_builduing',
        'hospital_block',
        'hospital_area',
        'hospital_city',
        'hospital_gps',
        'hospital_pic',
        'incident_attach',
        'incident_notes',
        'suggestion_attach',
        'suggestion_notes',
        'observation_attach',
        'observation_notes',
        'remarks_attach',
        'remarks_notes',
        't_range_name',
        't_range_desig',
        't_range_dept',
        't_range_cell',
        't_range_email',
        't_range_front',
        't_range_back',
        't_range_office',
        't_range_floor',
        't_range_building',
        't_range_block',
        't_range_area',
        't_range_city',
        't_range_photo',
        'adress_range_email',
        't_range_web',
        't_range_pin',
        't_range_gps',
        'point_one_check',
        'point_one',
        'point_two_check',
        'point_two',
        'point_three_check',
        'point_three',
        'point_four_check',
        'point_four',
        'point_five_check',
        'point_five',
        'point_six_check',
        'point_six',
        'point_seven_check',
        'point_seven',
        'point_eight_check',
        'point_eight',
        'point_nine_check',
        'point_nine',
        'point_ten_check',
        'point_ten',
        'point_eleven_check',
        'point_eleven',
        'point_twelve_check',
        'point_twelve',
        'point_thirteen_check',
        'point_thirteen',
        'point_forteen_check',
        'point_forteen',
        'point_fifteen_check',
        'point_fifteen',
        'point_sixteen_check',
        'point_sixteen',
        'point_seventeen_check',
        'point_seventen',
        'point_eighteen_check',
        'point_eighteen',
        'point_ninteen_check',
        'point_ninteen',
        'point_twenty_check',
        'point_twenty',
        'point_twentyone_check',
        'point_twentyone',
        'point_twentytwo_check',
        'point_twentytwo',
        'point_twentythree_check',
        'point_twentythree',
        'point_twentyfour_check',
        'point_twentyfour',
        'point_twentyfive_check',
        'point_twentyfive',
        'point_twentysix_check',
        'point_twentysix',
        'list_of_guard_training'
    ];
    public function trainingbudgets()
    {
        return $this->hasMany(TrainingBudget::class, 'trainings_id');
    }

    public function trainingweapons()
    {
        return $this->hasMany(TrainingWeapon::class, 'trainings_id');
    }

    public function trainingammunitions()
    {
        return $this->hasMany(TrainingAmmunition::class, 'trainings_id');
    }

    public function trainingarmourers()
    {
        return $this->hasMany(TrainingArmourer::class, 'trainings_id');
    }

    public function trainingequipments()
    {
        return $this->hasMany(TrainingEquipments::class, 'trainings_id');
    }

    public function trainingitems()
    {
        return $this->hasMany(TrainingItems::class, 'trainings_id');
    }
    public function trainingemergencies()
    {
        return $this->hasMany(TrainingEmergency::class, 'trainings_id');
    }
    public function trainingpocs()
    {
        return $this->hasMany(TrainingPoc::class, 'trainings_id');
    }


    public function guards()
    {
        return $this->belongsToMany(Hrm::class, 'training_guard', 'training_id', 'guard_id');
    }
    // app/Models/Training.php
// public function hrms()
// {
//     return $this->belongsToMany(Hrm::class, 'training_hrm', 'training_id', 'hrm_id');
// }

}
