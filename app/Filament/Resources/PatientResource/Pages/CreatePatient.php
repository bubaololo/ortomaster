<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePatient extends CreateRecord
{
    protected static string $resource = PatientResource::class;
    
//    public function create()
//    {
//        $record = new Patient();
//        $schema = Patient::getFormSchema();
//
//        return view('vendor.filament.models.your-model.create-with-photo', compact('record', 'schema'));
//    }

}
