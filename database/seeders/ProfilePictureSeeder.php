<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = DB::table('users')->get();

        foreach($users as $user) {
            DB::table('profile_pictures')->insert([
                'user_id' => $user->id,
                'url' => 'storage/app/' . Str::slug($user->name, '-') . '.jpg',
            ]);
        }
    }
}
