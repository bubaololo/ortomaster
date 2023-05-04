<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPatient extends EditRecord
{
    protected static string $resource = PatientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        info(print_r($data, true));
        if ($data['photo']) {
            $file = $data['photo'];
            $oldPath = 'livewire-tmp/' . $file;
            $newPath = 'public/' . $file;
            Storage::move($oldPath, $newPath);
        }
        return $data;
    }
}
