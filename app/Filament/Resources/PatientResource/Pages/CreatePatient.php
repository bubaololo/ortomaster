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
    protected static bool $canCreateAnother = false;
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Карточка нового пациента создана';
    }
    

    
//    public function afterCreate()
//    {
//    info('aftercreate');
//    }

    
//    public function create()
//    {
//        $record = new Patient();
//        $schema = Patient::getFormSchema();
//
//        return view('vendor.filament.models.your-model.create-with-photo', compact('record', 'schema'));
//    }

}
