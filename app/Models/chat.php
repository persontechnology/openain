<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    public function tabla(){
        $string= trim($this->detalle_estimacion);
        $elementos = preg_split('/ puntos?/', $string);
        return $elementos;
    }
}
