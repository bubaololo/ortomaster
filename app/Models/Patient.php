<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    
    protected $casts = [
        'diagnosis' => 'array',
    ];
}
