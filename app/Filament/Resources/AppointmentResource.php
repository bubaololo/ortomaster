<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Forms\Components\Webcam;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
                Section::make('Снимок')
                    ->description('сделать фото стоп')
                    ->schema([
                        Webcam::make('photo')
                            ->label('Фото')
                            ->required(function (string $context, Forms\Components\Component $component, ?Model $record) {
                        
                                if ($context == 'view') {
                                    
                                    if (isset($record->photo)) {
                                        $photoSrc = $record->photo;
                                        $component->extraAttributes(['class' => 'view', 'src' => $photoSrc]);
                                        info($record->photo);
                                    } else {
                                        $component->extraAttributes(['class' => 'view']);
                                    }
                        
                                }
                    
                                return true;
                            })
                            ->columnSpanFull(),
                    ]),
                Select::make('diagnosis')
                    ->multiple()
                    ->searchable()
                    ->options([
                        "Врожденный вывих бедра односторонний"
                        => "Врожденный вывих бедра односторонний",
                        "Врожденный вывих бедра двусторонний"
                        => "Врожденный вывих бедра двусторонний",
                        "Врожденный вывих бедра неуточненный"
                        => "Врожденный вывих бедра неуточненный",
                        "Врожденный подвывих бедра односторонний"
                        => "Врожденный подвывих бедра односторонний",
                        "Врожденный подвывих бедра двусторонний"
                        => "Врожденный подвывих бедра двусторонний",
                        "Врожденный подвывих бедра неуточненный"
                        => "Врожденный подвывих бедра неуточненный",
                        "Неустойчивое бедро, предрасположенность к вывиху бедра, предрасположенность к подвывиху бедра"
                        => "Неустойчивое бедро, предрасположенность к вывиху бедра, предрасположенность к подвывиху бедра",
                        "Другие врожденные деформации бедра, врожденная дисплазия вертлужной впадины"
                        => "Другие врожденные деформации бедра, врожденная дисплазия вертлужной впадины",
                        "Варусные деформации (приобретённые)"
                        => "Варусные деформации (приобретённые)",
                        "Конско-варусная косолапость"
                        => "Конско-варусная косолапость",
                        "Пяточно-варусная косолапость"
                        => "Пяточно-варусная косолапость",
                        "Варусная стопа"
                        => "Варусная стопа",
                        "Другие врожденные варусные деформации стопы (dарусная деформация большого пальца стопы врожденная)"
                        => "Другие врожденные варусные деформации стопы (dарусная деформация большого пальца стопы врожденная)",
                        "Пяточно-вальгусная косолапость"
                        => "Пяточно-вальгусная косолапость",
                        "Врожденная плоская стопа"
                        => "Врожденная плоская стопа",
                        "Плоская стопа (приобретённая)"
                        => "Плоская стопа (приобретённая)",
                        "Другие врожденные вальгусные деформации стопы"
                        => "Другие врожденные вальгусные деформации стопы",
                        "Полая стопа"
                        => "Полая стопа",
                        "Другие врожденные деформации стопы (косолапость)"
                        => "Другие врожденные деформации стопы (косолапость)",
                        "Врожденная деформация стопы неуточненная"
                        => "Врожденная деформация стопы неуточненная"
                    ])
                    ->label('Диагноз'),
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
                ImageColumn::make('photo')->label('Фото')->width(70)->height(50),
                TextColumn::make('diagnosis')->label('Диагноз'),
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
            'create' => Pages\CreateAppointment::route('/create/{record?}'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
            'view' => Pages\ViewAppointment::route('/{record}'),
            'print' => Pages\PrintAppointment::route('/{record}/print'),
        ];
    }
}
