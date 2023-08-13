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
use Filament\Tables\Actions\ReplicateAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
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
                    ->date()
                    ->label('Дата приёма')
                ->url(fn (Appointment $record) => AppointmentResource::getUrl('view', ['record' =>  $record])),
                ImageColumn::make('photo')
                    ->label('Фото')
                    ->width(70)
                    ->height(50)
                ->square(),
                TextColumn::make('branch.address')->label('Филиал')->sortable(),
                TextColumn::make('doctor.name')->label('Врач')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Новый приём')
                    ->icon('heroicon-o-clipboard-list')
                    ->url(function ( Livewire $livewire){
                        return AppointmentResource::getUrl().'/create/'. $livewire->ownerRecord->id;
                    }),
            ])
            ->actions([
                ReplicateAction::make()->excludeAttributes(['created_at','photo'])
                    ->tooltip('создать копию приёма, за исключением даты и фото, для более быстрого заполнения')
            
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
//                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
