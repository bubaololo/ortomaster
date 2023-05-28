<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;
use Livewire\WithFileUploads;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class Webcam extends Field
{
    use HasExtraAlpineAttributes;
    use WithFileUploads;
    

    
    public  $photo;
    protected string $view = 'vendor.filament.pages.create-with-photo';

//    protected string $view = 'forms.components.webcam';
    
    public function view(string $view, $viewData = []): static
    {
        info('view from webcam component');
        
        $this->view = $view;
        
        return $this;
    }
    

}
