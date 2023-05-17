<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 111310,
            'name' => "Peter",
            'surname' => 'Kopecký',
            'role' => "student",
            'email'=> "pista@pista.sk",
            'password' => "heslo",
            'num_tasks' => 8,
            'num_handed' => 7,
            'points_total' => 25
        ]);
    }
}
