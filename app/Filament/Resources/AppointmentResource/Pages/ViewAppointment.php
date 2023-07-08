<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PatientResource\Widgets\AppointmentOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\Actions\Action;

class ViewAppointment extends ViewRecord
{
    protected static string $resource = AppointmentResource::class;

//    protected static string $view = 'vendor.filament.pages.view-patient';
    
    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            
            Action::make('print')
                ->label('Печать')
                ->icon('heroicon-o-printer')
                ->url(function () {
                    return $this->getResource()::getUrl() . '/' . $this->record->id . '/print/';
                }),
        ];
        
        
    }
//    protected function getHeaderWidgets(): array
//    {
//        return [
//            AppointmentOverview::class,
//        ];
//    }
}