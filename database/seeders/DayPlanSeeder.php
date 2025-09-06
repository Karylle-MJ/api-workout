<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DayPlan;

class DayPlanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['day' => 'monday',    'workout_title' => 'Push Day',            'details' => 'Chest + Triceps',        'is_rest' => false],
            ['day' => 'tuesday',   'workout_title' => 'Pull Day',            'details' => 'Back + Biceps',          'is_rest' => false],
            ['day' => 'wednesday', 'workout_title' => 'Leg Day',             'details' => 'Quads + Hamstrings',     'is_rest' => false],
            ['day' => 'thursday',  'workout_title' => 'Core & Mobility',     'details' => 'Core circuits + stretch','is_rest' => false],
            ['day' => 'friday',    'workout_title' => 'Conditioning',        'details' => 'HIIT / cardio intervals','is_rest' => false],
            ['day' => 'saturday',  'workout_title' => 'Full-Body Circuit',   'details' => 'Light compound lifts',   'is_rest' => false],
            ['day' => 'sunday',    'workout_title' => 'Rest',                'details' => null,                     'is_rest' => true],
        ];

        foreach ($data as $row) {
            DayPlan::updateOrCreate(['day' => $row['day']], $row);
        }
    }
}
