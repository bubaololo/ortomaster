<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;
    protected static bool $canCreateAnother = false;
    
    public $record;
    

    
    
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Приём сохранён';
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $file = $data['photo'];
        $oldPath = 'livewire-tmp/'.$file;
        $newPath = 'public/'.$file;
        Storage::move($oldPath, $newPath);
        return $data;
    }
    protected function handleRecordCreation(array $data): Model
    {
        //save new appointment after patient created
        $patientId = $this->record;
        $doctorId = auth()->user()->doctor_id;
        $branchId = Doctor::find($doctorId)->branch_id;
        
        $appointment = new Appointment;
        $appointment->patient_id = $patientId;
        $appointment->doctor_id = $doctorId;
        $appointment->branch_id = $branchId;
        $appointment->save();
        
        return Patient::find($patientId);
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl().'/'. $this->record->id.'/print/';
    }
}
