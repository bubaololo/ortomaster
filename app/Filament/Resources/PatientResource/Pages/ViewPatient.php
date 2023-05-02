<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPatient extends ViewRecord
{
    protected static string $resource = PatientResource::class;
//    protected static string $view = 'vendor.filament.pages.view-patient';

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
