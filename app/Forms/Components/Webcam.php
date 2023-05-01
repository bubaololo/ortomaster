<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Field;
use Livewire\WithFileUploads;
    use Filament\Support\Concerns\HasExtraAlpineAttributes;

class Webcam extends Field
{
    use HasExtraAlpineAttributes;
    use WithFileUploads;
    
    public $photo;
    protected string $view = 'vendor.filament.pages.create-with-photo';

//    protected string $view = 'forms.components.webcam';
    
    public function view(string $view): static
    {
        info('view from webcam component');
        $this->view = $view;
        
        return $this;
    }
    
    public function save()
    
    {

//        $this->validate([
//
//            'photo' => 'image|max:1024', // 1MB Max
//
//        ]);
        info(print_r($this, true));
        $this->photo->store('photos');
        
    }
    public function setUp(): void
    {
        parent::setUp();
        info('setUp from webcam component');
    }
}
