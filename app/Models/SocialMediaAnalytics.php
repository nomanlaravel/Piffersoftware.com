<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class SocialMediaAnalytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'branch_id',
        'description',
        // LinkedIn
        'linkedin_morning_post',
        'linkedin_why_pifra',
        'linkedin_what_we_do',
        'linkedin_what_we_do_vedio',
        'linkedin_subscribers',
        'linkedin_comments',
        // Facebook
        'facebook_morning_post',
        'facebook_why_pifra',
        'facebook_what_we_do',
        'facebook_what_we_do_vedio',
        'facebook_subscribers',
        'facebook_comments',
        // Instagram
        'instagram_morning_post',
        'instagram_why_pifra',
        'instagram_what_we_do',
        'instagram_what_we_do_vedio',
        'instagram_subscribers',
        'instagram_comments',
        'branch_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'branch_id', 'branch_id');
    }
    public function customer()
{
    return $this->belongsTo(Customer::class, 'branch_id', 'branch_name');
}

}
