<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Support\Facades\Storage;
class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;
    
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Карточка нового пациента создана';
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
       
        $file = $data['photo'];
        $oldPath = 'livewire-tmp/'.$file;
        $newPath = 'public/'.$file;
        Storage::move($oldPath, $newPath);
        return $data;
    }
    
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl().'/'. $this->record->id.'/print/';
    }
    
//    public function create()
//    {
//        $record = new Patient();
//        $schema = Patient::getFormSchema();
//
//        return view('vendor.filament.models.your-model.create-with-photo', compact('record', 'schema'));
//    }

}
