<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    use HasFactory;
    public function oficina(){
        return $this->belongsTo(Oficina::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    
}

