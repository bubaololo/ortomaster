<?php

namespace App\Filament\Resources\DoctorResource\Pages;

use App\Filament\Resources\DoctorResource;
use App\Models\User;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDoctor extends EditRecord
{
    protected static string $resource = DoctorResource::class;
    
    
    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function () {
                    $isAssociatedToUsers = User::where('doctor_id', $this->record->id)->exists();
                    if ($isAssociatedToUsers) {
                        $this->notify('danger','Нельзя удалить врача пока он установлен у пользователя');
                        $this->redirect($this->getResource()::getUrl('index'));
                        $this->halt();
                    }
                }),
        ];
    }
}
