<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;
    
    protected static ?string $pluralLabel = 'Приёмы';
    
    protected static ?string $label = 'Приём';
    
    protected static ?string $navigationLabel = 'Приёмы';
    
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    protected static ?int $navigationSort = 2;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('patient_id')
                    ->relationship('patient', 'name')
                    ->searchable()
                    ->label('Пациент'),
                Forms\Components\Select::make('doctor_id')
                    ->relationship('doctor', 'name')
                    ->label('Врач'),
                Forms\Components\Select::make('branch_id')
                    ->relationship('branch', 'address')
                    ->label('Филиал'),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->sortable()->label('Дата приёма'),
                TextColumn::make('patient.name')->label('Пациент')
                    ->sortable()
                    ->searchable()
                    ->url(fn (Appointment $record) => PatientResource::getUrl('view', ['record' =>  $record])),
                TextColumn::make('branch.address')->label('Филиал')->sortable(),
                TextColumn::make('doctor.name')->label('Врач')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
//            ->filters([
//                Tables\Filters\Filter::make('created_at')
//                    ->form([
//                    Forms\Components\DatePicker::make('created_from')->label('С даты'),
//                    Forms\Components\DatePicker::make('created_until')->label('По дату'),
//                    ])
//                    ->query(function (Builder $query, array $data): Builder {
//                        return $query
//                            ->when(
//                                $data['created_from'],
//                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
//                            )
//                            ->when(
//                                $data['created_until'],
//                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
//                            );
//                    })
//            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
