<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function branch(): belongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    
    public function appointmentsToday(): int
    {
        return $this->hasMany(Appointment::class)->whereDate('created_at', Carbon::today())->count();
    }
    
    /**
     * Get all of the patients of doctor     */
//    public function patients(): HasManyThrough
//    {
//        return $this->hasManyThrough(Appointment::class, Patient::class);
//    }
    
}
