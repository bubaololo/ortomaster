<?php

namespace Database\Seeders;

use App\Models\Recommendation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recommendations = [
            ['text' => "Балансировочный диск 10-15 мин. в день"],
            ['text' => "Ортопедический коврик"],
            ['text' => "Ходьба по зыбучей поверхности (песок)"],
            ['text' => "Подушка-балансир по 5-10 мин. 2-3 р\день (диск-балансир)"]

        ];
    
        foreach ($recommendations as $recommendation) {
            Recommendation::create($recommendation);
        }
    }
}
