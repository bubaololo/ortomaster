<?php

namespace App\Filament\Resources;

use AbanoubNassem\FilamentPhoneField\Forms\Components\PhoneInput;
use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use Archilex\StackedImageColumn\Columns\StackedImageColumn;
use App\Models\Patient;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;


class PatientResource extends Resource
{
    protected static ?string $pluralLabel = 'Пациенты';
    protected static ?string $label = 'Пациент';
    protected static ?string $navigationLabel = 'Пациенты';
    protected static ?string $model = Patient::class;
    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?int $navigationSort = 1;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                TextInput::make('surname')->required()->label('Фамилия'),
                TextInput::make('name')->required()->label('Имя'),
                TextInput::make('middle_name')->label('Отчество'),
                PhoneInput::make('phone')->required()->label('Телефон')->tel(),
                DatePicker::make('birthdate')
//                    ->requiredWithout('alt_birthdate')
                    ->default(null)
                    ->label('Дата рождения'),
//                TextInput::make('alt_birthdate')
//                    ->placeholder('1990-08-24')
//                    ->visibleOn(['create'])
//                    ->rules(['date_format:Y-m-d'])
//                    ->label('Дата рождения (текстом)')
//            ->mask(fn (TextInput\Mask $mask) => $mask->pattern('00-00-0000'))
//                    ->helperText('Введите дату с клавиатуры в формате гггг-мм-дд'),
                Radio::make('gender')
                    ->label('Пол')
                    ->required()
                    ->options([
                        0 => 'Мужской',
                        1 => 'Женский',
                    ]),
//                Textarea::make('note')->label('Примечание')
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullName')
                    ->sortable()
                    ->searchable()
                    ->label('ФИО')
                ->grow(true)
                    ->size('lg')
                    ->weight('bold'),

                
                StackedImageColumn::make('appointment.photo')
                    ->label('приёмы')
                    ->circular()
                    ->limit(3)
                    ->showRemaining(),
                
                TextColumn::make('created_at')->sortable()->searchable()->label('Добавлен')->date(),
                TextColumn::make('phone')->searchable()->label('Телефон'),
                TextColumn::make('birthdate')
                    ->sortable()
                    ->date()
                    ->label('Дата рождения'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from')->label('С даты')->default('01.01.2022'),
                        DatePicker::make('created_until')->label('По дату')->default(now()),
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
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\AppointmentRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'view' => Pages\ViewPatient::route('/{record}'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        
        ];
    }
    
    protected function shouldPersistTableFiltersInSession(): bool
    {
        return false;
    }
    
    
}


