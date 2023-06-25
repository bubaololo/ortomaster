<?php

namespace App\Filament\Resources\AppointmentResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class TodayAppointments extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Unique views', '192.1k'),
            Card::make('Bounce rate', '21%'),
            Card::make('Average time on page', '3:12'),
        ];
    }
}
