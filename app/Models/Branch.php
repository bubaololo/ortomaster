<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
    
    public static function findByIP(): ?int
    {
        //        $clientIP = $_SERVER['REMOTE_ADDR'];
    
        $branch = self::where('ip', \Request::ip())->first();
        
        if ($branch) {
            return $branch->id;
        }
        
        return null;
    }
}
