<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Http\Livewire\PhotoInput;
use App\Forms\Components\Webcam;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ViewField;

class PatientResource extends Resource
{
    protected static ?string $pluralLabel = 'Пациенты';
    protected static ?string $label = 'Пациент';
    protected static ?string $model = Patient::class;
    protected static ?string $navigationLabel = 'Пациенты';
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Webcam::make('photo')->required()->label('Фото'),
                TextInput::make('name')->required(),
                TextInput::make('diagnosis')->required(),
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
                TextColumn::make('name')->label('Имя')->sortable()->searchable(),
                TextColumn::make('diagnosis'),
                ImageColumn::make('photo'),
                TextColumn::make('created_at')->sortable()
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
        ];
    }
    public function submit()
    {
        dd($this->form->getState());
    }
//    protected function getRedirectUrl(): string
//    {
//        return $this->getResource()::getUrl('index');
//    }
}
