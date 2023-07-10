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
            ['name' => 'Мухамедалиева Наргиза Насырхановна'],
            ['name' => 'Сатаров Умид Абдугапарович'],
            ['name' => 'Никонов Эрстан Кенчибекович'],
            ['name' => 'Юлдошев Абдумалик Холбутаевич'],
            ['name' => 'Садырбеков Дастан'],
        ];
    
        foreach ($doctors as $doctorData) {
            Doctor::create($doctorData);
        }
    }
}
