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
            ['address' => 'Байтик Баатыра','full_address' => 'Бишкек, улица Байтик Баатыра 19'],
            ['address' => 'Суеркулова','full_address' => 'Бишкек, улица Суеркулова 1/3'],
            ['address' => 'Oш','full_address' => 'Исхака Разакова 59а'],
        ];
        
        foreach ($branches as $branchData) {
            Branch::create($branchData);
        }
    }
}
