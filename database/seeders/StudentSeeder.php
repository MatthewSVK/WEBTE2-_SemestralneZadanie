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
            'id' => 80804,
            'name' => "Jozo",
            'surname' => 'Dezo',
            'role' => "Teacher",
            'email'=> "zrbo@gmail.sk",
            'password' => "necumvole",
            'num_tasks' => null,
            'num_handed' => null,
            'points_total' => null
        ]);
    }
}
