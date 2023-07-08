<?php

namespace App\Filament\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PatientResource;
use App\Filament\Resources\PatientResource\Widgets\AppointmentOverview;
use App\Models\Appointment;
use Carbon\Carbon;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component as Livewire;

class TodayAppointments extends ListRecords
{
    protected static ?string $pluralLabel = 'Мои приёмы';
    
    protected static ?string $label = 'Мои приёмы за сегодня';
    
    protected static ?string $navigationLabel = 'Мои приёмы';
    
    
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
                    ->time('h:m')
                    ->label('Время приёма'),
                TextColumn::make('patient.fullName')->label('Пациент')
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
    
    public static function canCreate(Model $record): bool
    {
        return false;
    }
    
    protected function getActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
    
    protected function getHeaderWidgets(): array
    {
            return [
                AppointmentOverview::class,
            ];
    }
}
