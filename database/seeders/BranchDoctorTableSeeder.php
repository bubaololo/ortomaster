<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 
        $branch1 = Branch::create(['address' => 'г. Москва, ул. Ленина, д. 10']);
        $branch2 = Branch::create(['address' => 'г. Санкт-Петербург, пр. Невский, д. 20']);
        $branch3 = Branch::create(['address' => 'г. Новосибирск, ул. Красный проспект, д. 30']);
    
        $doctor1 = Doctor::create(['name' => 'Доктор 1']);
        $doctor2 = Doctor::create(['name' => 'Доктор 2']);
        $doctor3 = Doctor::create(['name' => 'Доктор 3']);
    
        $branch1->doctors()->attach([$doctor1->id, $doctor2->id]);
        $branch2->doctors()->attach([$doctor2->id, $doctor3->id]);
        $branch3->doctors()->attach([$doctor1->id, $doctor3->id]);
    }
    
}
