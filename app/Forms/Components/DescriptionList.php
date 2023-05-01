<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class DescriptionList extends Component
{
    public static function make(): static
    {
        protected string $view = 'filament.forms.components.description-list';
        return new static();
    }
}