<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    
//    protected $guarded = [];
    protected $fillable = [
        'name',
        'surname',
        'middle_name',
        'phone',
        'note',
        'birthdate',
        'gender'];
    
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? ucfirst($value) : null,
            set: fn(?string $value) => $value ? strtolower($value) : null,
        );
    }
    
    protected function middleName(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? ucfirst($value) : null,
            set: fn(?string $value) => $value ? strtolower($value) : null,
        );
    }
    
    protected function surname(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? ucfirst($value) : null,
            set: fn(?string $value) => $value ? strtolower($value) : null,
        );
    }
    
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->concatFullName()
        );
    }
    
    private function concatFullName(): string
    {
        return
            ucwords(
                str($this->attributes['surname'])
                    ->append(' ')
                    ->append($this->attributes['name'])
                    ->append(' ')
                    ->append($this->attributes['middle_name'])
            );
    }
    
    
    protected $casts = [
        'diagnosis' => 'array',
    ];
}
