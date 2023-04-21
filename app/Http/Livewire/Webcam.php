<?php

namespace App\Http\Livewire;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Webcam extends Component implements HasForms
{
    use InteractsWithForms;
    
    public $photo = '';
    
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('photo')->required()
        
        ];
    }
    
    public function register(): void
    {
    $this->form->getState();
    }
    
    public function render()
    {
        
        return view('livewire.webcam');
    }
}
