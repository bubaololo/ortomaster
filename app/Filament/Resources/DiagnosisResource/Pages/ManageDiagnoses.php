<?php

namespace App\Filament\Resources\DiagnosisResource\Pages;

use App\Filament\Resources\DiagnosisResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDiagnoses extends ManageRecords
{
    protected static string $resource = DiagnosisResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
