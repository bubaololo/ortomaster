<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class ViewPatient extends ViewRecord
{
    protected static string $resource = PatientResource::class;
//    protected static string $view = 'vendor.filament.pages.view-patient';

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('print')
                ->label('Печать')
                ->url(function ( ){
                    return $this->getResource()::getUrl().'/'. $this->record->id.'/print/';
                }),
        ];
    }
}
