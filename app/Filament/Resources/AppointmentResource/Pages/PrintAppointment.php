<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
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

        $this->patient = Patient::find($this->appointment->patient_id);
        $this->doctor = auth()->user()->doctor->name;
        $this->birthdate = Carbon::parse($this->patient->birthdate)
            ->translatedFormat('d M Y');
        $this->date = Carbon::parse($this->appointment->created_at)
            ->translatedFormat('d M Y в h:m');
        $this->age = $this->getAge();
        
      

        
    }
    
    private function getAge(): string
    {
        $age = Carbon::parse($this->patient->birthdate)->age;
        $ageString = $age . ' ';
        if ($age % 10 === 1 && $age !== 11) {
            $ageString .= 'год';
        } elseif ($age % 10 >= 2 && $age % 10 <= 4 && ($age < 10 || $age > 20)) {
            $ageString .= 'года';
        } else {
            $ageString .= 'лет';
        }
    
        return $ageString;
    }
}
