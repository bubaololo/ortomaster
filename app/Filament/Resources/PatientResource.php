<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Http\Livewire\PhotoInput;
use App\Forms\Components\Webcam;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
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
                            ->required(function (string $context, Forms\Components\Component $component,?Model $record) {
            
                                if($context == 'view') {
                                    if(isset($record->photo)) {
                                        $photoSrc = $record->photo;
                                        $component->extraAttributes(['class' => 'view', 'src' => $photoSrc]);
                                    } else {
                                        $component->extraAttributes(['class' => 'view']);
                                    }
                
                                }

//                        info(print_r($photoSrc , true));
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
                TextInput::make('diagnosis')->required()->label('Диагноз'),
                DatePicker::make('birthdate')->label('дата рождения')
//                TextInput::make('photo'),
//                ViewField::make('photo')->view('vendor.filament.pages.create-with-photo'),
//                FileUpload::make('photo')->view('vendor.filament.pages.create-with-photo')->beforeStateDehydrated(function (Forms\Components\FileUpload $component, $state) {
//                    info($state);
//                }),
//                Forms\Components\FileUpload::make('photo'),
//                Webcam::make('photo')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('ФИО'),
                TextColumn::make('diagnosis')->label('Диагноз'),
                TextColumn::make('birthdate')->label('дата рождения'),
                ImageColumn::make('photo')->label('Фото'),
                TextColumn::make('created_at')->sortable()->label('Добавлен'),
            ])
            ->filters([
                //
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
    public function submit()
    {
        dd($this->form->getState());
    }

}
