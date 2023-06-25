<?php

namespace App\Filament\Resources\PatientResource\Widgets;

use App\Models\Appointment;
use Filament\Widgets\Widget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AppointmentOverview extends Widget
{
    protected static string $view = 'filament.resources.patient-resource.widgets.appointment-overview';
    
    public int $appointmentQty;
    
    public function mount()
    
    {
        $this->appointmentQty = auth()->user()->doctor->appointmentsToday();
    }
    
}
