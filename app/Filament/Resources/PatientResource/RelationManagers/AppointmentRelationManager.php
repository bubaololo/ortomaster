<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use App\Filament\Resources\AppointmentResource;
use App\Filament\Resources\PatientResource;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component as Livewire;

class AppointmentRelationManager extends RelationManager

{
    protected static string $relationship = 'appointment';

    protected static ?string $recordTitleAttribute = 'created_at';
    
    protected static ?string $modelLabel = 'Приём';
    protected static ?string $pluralModelLabel = 'Приёмы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('created_at')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Дата приёма')
                ->url(fn (Appointment $record) => AppointmentResource::getUrl('view', ['record' =>  $record])),
                ImageColumn::make('photo')->label('Фото')->width(70)->height(50),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Новый приём')
                    ->icon('heroicon-o-clipboard-list')
                    ->url(function ( Livewire $livewire){
                        info(print_r($livewire->ownerRecord,true));
                        return AppointmentResource::getUrl().'/create/'. $livewire->ownerRecord->id;
                    }),
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
//                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
