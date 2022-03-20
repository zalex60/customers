<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'regions';
    public $timestamps = false;
    protected $fillable = ['descripcion','status'];

    public function communes(){
        return $this->hasMany('App\Models\Commune','id_reg');
    }

    public function customers(){
        return $this->hasMany('App\Models\Commune','id_reg');
    }

    public function getKeyName(){
        return "id_reg";
    }
}
