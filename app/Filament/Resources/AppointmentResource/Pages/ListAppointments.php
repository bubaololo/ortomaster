<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PatientResource\Widgets\AppointmentOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;
    
    protected function getActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
    

}
