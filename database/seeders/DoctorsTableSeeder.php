<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            ['name' => 'Доктор Иванов', 'description' => 'Кардиолог'],
            ['name' => 'Доктор Петров', 'description' => 'Невролог'],
            ['name' => 'Доктор Сидоров', 'description' => 'Хирург'],
            ['name' => 'Доктор Смирнова', 'description' => 'Терапевт'],
            ['name' => 'Доктор Козлова', 'description' => 'Офтальмолог'],
        ];
    
        foreach ($doctors as $doctorData) {
            Doctor::create($doctorData);
        }
    }
}
