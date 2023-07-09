<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Exception;
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
        $this->checkup = $this->getCheckup();
        
        
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
    
    private function getCheckup()
    {
        $checkupPeriod = $this->appointment->checkup_date;
        try {
            if (str_contains($checkupPeriod, '3')) {
                $finalDate = Carbon::parse($this->appointment->created_at)->addMonths(3)->translatedFormat('d M');
            } elseif (str_contains($checkupPeriod, '6')) {
                $finalDate = Carbon::parse($this->appointment->created_at)->addMonths(6)->translatedFormat('d M');
            } elseif (str_contains($checkupPeriod, '1')) {
                $finalDate = Carbon::parse($this->appointment->created_at)->addYear()->translatedFormat('d M');
            } else {
                throw new Exception('Неверное значение даты обследования');
            }
        } catch (Exception $e) {
            echo 'Ошибка: ' . $e->getMessage();
        }
        
        return $checkupPeriod.' - '.$finalDate;
    }
}
