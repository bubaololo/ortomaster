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
            ['name' => 'Мухамедалиева Наргиза Насырхановна', 'description' => 'Кардиолог'],
            ['name' => 'Сатаров Умид Абдугапарович', 'description' => 'Невролог'],
            ['name' => 'Никонов Эрстан Кенчибекович', 'description' => 'Хирург'],
            ['name' => 'Юлдошев Абдумалик Холбутаевич', 'description' => 'Терапевт'],
        ];
    
        foreach ($doctors as $doctorData) {
            Doctor::create($doctorData);
        }
    }
}
