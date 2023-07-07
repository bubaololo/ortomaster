<?php

namespace App\Filament\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PatientResource;
use App\Models\Appointment;
use Carbon\Carbon;
use Filament\Pages\Page;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component as Livewire;

class TodayAppointments extends ListRecords
{
    protected static ?string $navigationIcon = 'heroicon-s-clipboard-list';

    protected static string $view = 'filament.pages.today-appointments';
    
    protected static string $resource = AppointmentResource::class;
    
    protected static function shouldRegisterNavigation(): bool
    {
        return boolval(auth()->user()->doctor_id);
    }
    
    protected function getTableQuery(): Builder
    {
        $query = Appointment::query();
        $query->where('doctor_id', auth()->user()->doctor_id)
            ->whereDate('created_at', Carbon::today());
    
        return $query;
    }
    
    function table(Table $table): Table
    {
        return $table
        
            ->columns([
                TextColumn::make('№')->getStateUsing(
                    static function (\stdClass $rowLoop, Livewire $livewire ): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->tableRecordsPerPage * (
                                    $livewire->page - 1
                                ))
                        );
                    }
                ),
                TextColumn::make('created_at')
                    ->time()
                    ->label('Время приёма'),
                TextColumn::make('patient.name')->label('Пациент')
                    ->url(fn(Appointment $record) => PatientResource::getUrl('view', ['record' => $record->patient_id])),

            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
    
    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }
    
    protected function getDefaultTableSortDirection(): ?string
    {
        return 'dsc';
    }
    
}
