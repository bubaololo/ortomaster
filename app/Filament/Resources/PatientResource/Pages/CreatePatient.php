<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
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
    
//    public function afterCreate()
//    {
//    info('aftercreate');
//    }
    protected function handleRecordCreation(array $data): Model
    {
        //save new appointment after patient created
        $patientId = $this->getModel()::create($data)->id;
        $doctorId = auth()->user()->doctor_id;
        $branchId = Doctor::find($doctorId)->branch_id;
        
        $appointment = new Appointment;
        $appointment->patient_id = $patientId;
        $appointment->doctor_id = $doctorId;
        $appointment->branch_id = $branchId;
        $appointment->save();
//        info(print_r($this->getModel()::create($data)->id,true));
        info(print_r($appointment, true));
        return $this->getModel()::create($data);
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
