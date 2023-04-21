<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PhotoInput extends Component
{
    public $photo;
    
    public function updatedPhoto()
    {
        // When the user selects a photo, we'll save it to storage and set the filename on the record
        $filename = Str::random(40) . '.' . $this->photo->extension();
        Storage::putFileAs('photos', $this->photo, $filename);
        $this->emitUp('updateAttribute', 'photo', $filename);
    }
    
    public function render()
    {
        return view('livewire.photo-input');
    }
}