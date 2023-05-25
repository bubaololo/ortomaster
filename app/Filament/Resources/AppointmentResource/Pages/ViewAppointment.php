<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Model;

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
                ->url(function ( ){
                    return $this->getResource()::getUrl().'/'. $this->record->id.'/print/';
                }),
        ];
    }
}
