<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use Filament\Resources\Pages\Page;

class PrintAppointment extends Page
{
    protected static string $resource = AppointmentResource::class;
    protected static ?string $title = 'Печать бланка';
    protected static string $view = 'filament.resources.appointment-resource.pages.print-appointment';
    public $appointment;
    
    public function mount($record)
    
    {
        
        $this->appointment = Appointment::find($record);
//        dd($this->appointment);
        $this->patient = Patient::find($this->appointment->patient_id);
        
    }
}
