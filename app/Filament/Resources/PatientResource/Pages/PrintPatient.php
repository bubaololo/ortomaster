<?php

namespace App\Filament\Resources\PatientResource\Pages;

use App\Filament\Resources\PatientResource;
use App\Models\Patient;
use Filament\Resources\Pages\Page;

class PrintPatient extends Page
{
    protected static string $resource = PatientResource::class;

    protected static string $view = 'filament.resources.patient-resource.pages.print-patient';
    public $patient;
    
    public function mount($record)
    
    {
        
        $this->patient = Patient::find($record);
        
    }
}
