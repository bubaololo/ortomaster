<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateSnapshot extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public Patient $patient;
    public $name;
    public $diagnosis;
    public $photo;
    
    public function mount(): void
    {
        $this->form->fill([
            'name' => $this->patient->name,
            'diagnosis' => $this->patient->diagnosis,
            'photo' => $this->patient->photo,
        ]);
    }
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('diagnosis')->required(),
            Forms\Components\TextInput::make('photo')->required(),

        ];
    }
    
    public function submit(): void
    {
       dd($this->form->getState());
    }
    
    public function render(): View
    {
        return view('livewire.create-snapshot');
    }
    
}
