<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function incidencia(){
        return $this->belongsTo(Incidencia::class);
    }

    public function oficina(){
        return $this->belongsTo(Oficina::class);
    }
    //una amuchos
    public function dispositivo(){
        return $this->belongsTo(Dispositivos::class);
    }

    //muchos a 1
    public function historials(){
        return $this->hasMany(Historial::class);
    }
}
