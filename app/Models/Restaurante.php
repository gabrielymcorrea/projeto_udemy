<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurante extends Model{

    protected $fillable = [
        'name',
        'description',
        'address',
    ];
   
    //relacionamento
    public function menus(){
        return $this->hasMany(Menu::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(RestaurantePhoto::class);
    }
}