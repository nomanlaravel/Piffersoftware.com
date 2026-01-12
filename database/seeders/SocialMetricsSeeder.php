<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMetricsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_metrics')->insert([
        ['platform' => 'facebook', 'post_type' => 'morning_post', 'likes' => 2],
        ['platform' => 'facebook', 'post_type' => 'why_pifra', 'likes' => 1],
        ['platform' => 'facebook', 'post_type' => 'video', 'likes' => 3],
        ['platform' => 'facebook', 'post_type' => 'subscribers', 'likes' => 5],
        ['platform' => 'facebook', 'post_type' => 'comments', 'likes' => 1],
        ['platform' => 'linkedin', 'post_type' => 'morning_post', 'likes' => 1],
        ['platform' => 'linkedin', 'post_type' => 'why_pifra', 'likes' => 0],
        ['platform' => 'linkedin', 'post_type' => 'video', 'likes' => 0],
        ['platform' => 'linkedin', 'post_type' => 'subscribers', 'likes' => 0],
        ['platform' => 'linkedin', 'post_type' => 'comments', 'likes' => 0],
        ['platform' => 'instagram', 'post_type' => 'morning_post', 'likes' => 0],
        ['platform' => 'instagram', 'post_type' => 'why_pifra', 'likes' => 0],
        ['platform' => 'instagram', 'post_type' => 'video', 'likes' => 0],
        ['platform' => 'instagram', 'post_type' => 'subscribers', 'likes' => 0],
        ['platform' => 'instagram', 'post_type' => 'comments', 'likes' => 0],
        ['platform' => 'twitter', 'post_type' => 'morning_post', 'likes' => 0],
        ['platform' => 'twitter', 'post_type' => 'why_pifra', 'likes' => 0],
        ['platform' => 'twitter', 'post_type' => 'video', 'likes' => 0],
        ['platform' => 'twitter', 'post_type' => 'subscribers', 'likes' => 0],
        ['platform' => 'twitter', 'post_type' => 'comments', 'likes' => 0],
        ]);
    }
}
