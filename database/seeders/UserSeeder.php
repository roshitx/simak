<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Generate dummy data
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'username' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'role' => 'Client',
                'birth' => $faker->date,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        User::create([
            'fullname' => 'Muhammad Aulia Rasyid Alzahrawi',
            'username' => 'Roshit',
            'email' => 'auliarasyidalzahrawi@gmail.com',
            'gender' => 'Male',
            'password' => Hash::make('rosyid07'),
        ]);
    }
}
