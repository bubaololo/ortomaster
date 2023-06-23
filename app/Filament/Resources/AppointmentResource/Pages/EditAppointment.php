<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditAppointment extends EditRecord
{
    protected static string $resource = AppointmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\DeleteAction::make()->after(function (?Model $record) {
                if(isset($record->photo)) {
                    $fileName = $record->photo;
                    Storage::delete('/public/'.$fileName);
                }
            }),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['photo']) {
            $file = $data['photo'];
            $oldPath = 'livewire-tmp/' . $file;
            $newPath = 'public/' . $file;
            Storage::move($oldPath, $newPath);
        }
        if($data['extra_diagnosis']){
        
            $data['diagnosis'][] = $data['extra_diagnosis'];
        }
        unset($data['extra_diagnosis']);
        return $data;
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
