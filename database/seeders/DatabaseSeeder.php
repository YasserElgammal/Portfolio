<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'about_title' => 'Software Engineer',
            'about_description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'fb_url' => 'https://www.facebook.com/yasser.elgammal/',
            'github_url' => 'https://github.com/YasserElgammal',
            'linkedin_url' => 'https://www.linkedin.com/in/elgammal/',
            'freelance_url' => '#li',
            'cv_url' => '#cv',
            'video_url' => '#video'
        ]);
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Profile User',
            'email' => 'test@example.com',
        ]);
    }
}
