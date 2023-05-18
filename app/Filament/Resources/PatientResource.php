<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Http\Livewire\PhotoInput;
use App\Forms\Components\Webcam;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ViewField;

class PatientResource extends Resource
{
    protected static ?string $pluralLabel = 'Пациенты';
    protected static ?string $label = 'Пациент';
    protected static ?string $navigationLabel = 'Пациенты';
    protected static ?string $model = Patient::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
                                    } else {
                                        $component->extraAttributes(['class' => 'view']);
                                    }
                                    
                                }
                                
                                return true;
                            })
                            ->columnSpanFull(),
                    ]),
                
                TextInput::make('name')->required()
//                  ->required(function (string $context, Forms\Components\Component $component) {
//                    if($context == 'view') {
//                        $component->extraAttributes(['class' => 'ebal']);
//                    }
//                    return true;
//                })
                    ->label('ФИО'),
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
                DatePicker::make('birthdate')->label('дата рождения')
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('ФИО'),
                TextColumn::make('created_at')->sortable()->label('Добавлен'),
                TextColumn::make('birthdate')->label('дата рождения'),
                ImageColumn::make('photo')->label('Фото'),
                TextColumn::make('diagnosis')->label('Диагноз'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('Добавлен С'),
                        Forms\Components\DatePicker::make('created_until')->label('Добавлен По'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'view' => Pages\ViewPatient::route('/{record}'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
            'print' => Pages\PrintPatient::route('/{record}/print'),
        ];
    }
    
    protected function defaultSort()
    {
        $this->sortBy('created_at', 'desc');
    }
    

}


