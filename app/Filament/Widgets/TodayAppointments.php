<?php

namespace App\Filament\Widgets;

use App\Models\Doctor;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TodayAppointments extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $pollingInterval = null;
    protected function getColumns(): int
    {
        return 3;
    }
    protected function getCards(): array
    {

        $doctors = Doctor::all();
    
        $sortedDoctors = $doctors->sortByDesc(function ($doctor) {
            return $doctor->appointmentsToday();
        });
        
        $doctorStatsWidgets = [];
        foreach($sortedDoctors as $doctor){
            $doctorStatsWidgets[] = Card::make($doctor->name, $doctor->appointmentsToday())
                ->description('приёмов сегодня')
                ->descriptionIcon('heroicon-o-user-add')
                ->chart([
                    $doctor->appointmentsForDay(Carbon::today()->subDay()),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(2)),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(3)),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(4)),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(5)),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(6)),
                    $doctor->appointmentsForDay(Carbon::today()->subDays(7)),
                    
                ]);
        }

        return $doctorStatsWidgets;

    }
}
