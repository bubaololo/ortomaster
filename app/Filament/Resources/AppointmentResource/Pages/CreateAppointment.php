<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Branch;
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
        if($this->record) {
            $patientId = $this->record;
            $data['patient_id'] = $patientId;
        }
        if($data['extra_diagnosis']){
            
            $data['diagnosis'][] = $data['extra_diagnosis'];
        }
        unset($data['extra_diagnosis']);
        $doctorId = auth()->user()->doctor_id;
        $branchId = $this->getBranch($doctorId);
        $file = $data['photo'];
        $oldPath = 'livewire-tmp/'.$file;
        $newPath = 'public/'.$file;
        Storage::move($oldPath, $newPath);
        
        $data['doctor_id'] = $doctorId;
        $data['branch_id'] = $branchId;
//        $data['diagnosis'] = json_encode($data['diagnosis'], JSON_UNESCAPED_UNICODE);
        
        return $data;
    }
//    protected function handleRecordCreation(array $data): Model
//    {
//
//        info(print_r($data, true));
//        //save new appointment after patient created
//        $patientId = $this->record;
//        $doctorId = auth()->user()->doctor_id;
//        $branchId = Doctor::find($doctorId)->branch_id;
//
//        $appointment = new Appointment;
//        $appointment->patient_id = $patientId;
//        $appointment->doctor_id = $doctorId;
//        $appointment->branch_id = $branchId;
////        $appointment->photo = $data['photo'];
////        $appointment->diagnosis = $data['diagnosis'];
//        $appointment->save();
//
//        return $this->getModel()::create($data);
//    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl().'/'. $this->record->id.'/print/';
    }
    private function getBranch($doctorId) {
    
//        $clientIP = \Request::ip();
//        $clientIP = $_SERVER['REMOTE_ADDR'];
        $branchId = Branch::findByIP();
        if($branchId) {
            return $branchId;
        } else {
            return Doctor::find($doctorId)->branch_id;
        }
    }
}
