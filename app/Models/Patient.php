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
    
    public function getMiddleNameAttribute($value)
    {
        return $value ? ucfirst($value) : null;
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
    
    public function shortName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->concatShortName()
        );
    }
    
//    protected function phone(): Attribute
//    {
//        return Attribute::make(
//            get: fn(?string $value) => $value ? '+996'.$value : null,
//        );
//    }
    
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
    
    private function concatShortName(): string
    {
        return
            ucwords(
                str($this->attributes['surname'])
                    ->append(' ')
                    ->append(mb_substr($this->attributes['name'], 0, 1))
                    ->append('. ')
                    ->append(mb_substr($this->attributes['middle_name'], 0, 1))
                    ->append('.')
            );
    }
    
    
    protected $casts = [
        'diagnosis' => 'array',
    ];
}
