<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function branch(): belongsTo
    {
        return $this->belongsTo(Branch::class);
    }
    public function patient(): belongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    public function doctor(): belongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
