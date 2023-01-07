<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    use HasFactory;

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function oficina(){
        return $this->hasMany(Oficina::class);
    }
}

