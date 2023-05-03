<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            ['address' => 'г. Москва, ул. Ленина, д. 10'],
            ['address' => 'г. Санкт-Петербург, пр. Невский, д. 20'],
            ['address' => 'г. Новосибирск, ул. Красный проспект, д. 30'],
            ['address' => 'г. Екатеринбург, ул. Ленина, д. 40'],
            ['address' => 'г. Красноярск, ул. Красная, д. 50'],
        ];
        
        foreach ($branches as $branchData) {
            Branch::create($branchData);
        }
    }
}
