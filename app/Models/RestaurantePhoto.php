<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantePhoto extends Model
{
    protected $table = 'table_restaurante_photos';
    protected $fillable = [
        'photo'
    ];

    public function restaurante(){
        return $this->belongsTo(Restaurante::class);
    }
}
