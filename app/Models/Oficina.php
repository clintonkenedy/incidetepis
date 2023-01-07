<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    use HasFactory;
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    public function dispositivos(){
        return $this->hasMany(Dispositivos::class);
    }
}
