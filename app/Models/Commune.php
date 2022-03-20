<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = 'communes';
    public $timestamps = false;
    protected $fillable = ['descripcion','id_reg','status'];

    public function region(){
        return $this->belongsTo('App\Models\Region','id_reg');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer','id_com');
    }

    public function getKeyName(){
        return "id_com";
    }
}
