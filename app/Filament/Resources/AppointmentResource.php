<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Filament\Widgets\TodayAppointments;
use App\Forms\Components\Webcam;
use App\Models\Appointment;
use App\Models\Diagnosis;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Yepsua\Filament\Forms\Components\RangeSlider;

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
                    ->label('Пациент')
                    ->hidden(),
                Forms\Components\Select::make('doctor_id')
                    ->relationship('doctor', 'name')
                    ->label('Врач')
                    ->hidden(),
                Forms\Components\Select::make('branch_id')
                    ->relationship('branch', 'address')
                    ->label('Филиал')
                    ->hidden(),
                Section::make('Снимок')
                    ->description('фото стоп')
                    ->schema([
                        Webcam::make('photo')
                            ->label('Фото')
                            ->required(function (string $context, Forms\Components\Component $component, ?Model $record) {
                                
                                if ($context == 'view') {
                                    
                                    if (isset($record->photo)) {
                                        $photoSrc = $record->photo;
                                        $component->extraAttributes(['class' => 'view', 'src' => $photoSrc]);
                                    } else {
                                        $component->extraAttributes(['class' => 'view', 'src' => 'no-photo.png']);
                                    }
                                    
                                }
                                
                                return true;
                            })
                            ->columnSpanFull(),
                    ]),
                Fieldset::make('Высота сводов')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('longitudinal_arch_left')
                                    ->datalist(range(0.8, 2.8, 0.1))
                                    ->numeric()
                                    ->label('продольный свод левый'),
                                TextInput::make('longitudinal_arch_right')
                                    ->datalist(range(0.8, 2.8, 0.1))
                                    ->numeric()
                                    ->minValue(0.8)
                                    ->maxValue(2.8)
                                    ->label('продольный свод правый'),
                                Select::make('transverse_arch')
                                    ->options(['0.3' => 0.3, '0.4' => 0.4, '0.5' => 0.5, '0.6' => 0.6,'0.7' => 0.7, '0.8' => 0.8])
                                    ->label('поперечный свод'),
                            ])
                    ]),
                Fieldset::make('Пронаторы')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('pronator_type')
                                    ->searchable()
                                    ->options([
                                        'Супинатор' =>
                                            'Супинатор',
                                        'Подпяточник для компенсации укорочения конечности' =>
                                            'Подпяточник для компенсации укорочения конечности',
                                        'Метатарзальный валик' =>
                                            'Метатарзальный валик',
                                        'Антивальгусный пронатор' =>
                                            'Антивальгусный пронатор',
                                        'Антиварусный пронатор' =>
                                            'Антиварусный пронатор',
                                        'Передне-латеральный пронатор' =>
                                            'Передне-латеральный пронатор',
                                        'Передне-медиальный пронатор' =>
                                            'Передне-медиальный пронатор',
                                        'Дорсально-латеральный пронатор',
                                        'Дорсально-медиальный пронатор' =>
                                            'Дорсально-медиальный пронатор',
                                    ])
                                    ->label('Тип пронатора'),
                                Select::make('pronator_left')
                                    ->options(['0.5' => 0.5, '0.7' => 0.7, '0.8' => 0.8, '1' => 1])
                                    ->label('слева'),
                                Select::make('pronator_right')
                                    ->options(['0.5' => 0.5, '0.7' => 0.7, '0.8' => 0.8, '1' => 1])
                                    ->label('справа'),
                                Forms\Components\Textarea::make('shoes')
                                    ->rows(2)->label('Обувь')
                            ]),
                    ]),
                
                Fieldset::make('Диагноз')
                    ->schema([
                        Select::make('diagnosis')
                            ->multiple()
                            ->searchable()
                            ->options(Diagnosis::all()->pluck('text', 'text'))
                            ->preload()
                            ->label('Диагноз'),
                        
                        Forms\Components\Textarea::make('extra_diagnosis')->label('Дополнительный диагноз')
                            ->rows(2)
                            ->visibleOn(['create', 'edit'])
                            ->helperText('Добавление диагноза, которого нет в списке МКБ'),
                    ]),
                Radio::make('bus')
                    ->options([
                        'S' => 'S',
                        'M' => 'M',
                        'L' => 'L'
                    ])
                    ->inline()
                    ->label('Отводящая шина'),
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
                    ->url(fn(Appointment $record) => PatientResource::getUrl('view', ['record' => $record->patient_id])),
                TextColumn::make('branch.address')->label('Филиал')->sortable(),
                TextColumn::make('doctor.name')->label('Врач')->sortable(),
                ImageColumn::make('photo')->label('Фото')->width(70)->height(50),
                TextColumn::make('diagnosis')->label('Диагноз'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')->label('С даты')->default('01.01.2022'),
                        Forms\Components\DatePicker::make('created_until')->label('По дату')->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                SelectFilter::make('doctor')->relationship('doctor', 'name')->label('Врач'),
                SelectFilter::make('branch')->relationship('branch', 'address')->label('Филиал')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                ReplicateAction::make()->excludeAttributes(['created_at', 'photo'])
                    ->tooltip('создать копию приёма, за исключением даты и фото, для более быстрого заполнения')
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
    
    public static function canCreate(): bool
    {
        return true;
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
    protected function shouldPersistTableFiltersInSession(): bool
    {
        return false;
    }
    public static function getWidgets(): array
    {
        return [
            TodayAppointments::class,
        ];
    }
}
