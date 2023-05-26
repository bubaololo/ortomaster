<?php

namespace App\Filament\Resources\PatientResource\Widgets;

use Filament\Widgets\Widget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AppointmentOverview extends Widget
{
    protected static string $view = 'filament.resources.patient-resource.widgets.appointment-overview';
    
    protected function getTableQuery(): Builder
    {
        return Order::query()->latest();
    }
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('appointment.created_at'),
//            Tables\Columns\TextColumn::make('appointment.diagnosis')
//                ->label('Customer'),
        ];
    }
    
}
