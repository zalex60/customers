<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    //table name
    protected $table = 'communes';
    //there is no data on the dates
    public $timestamps = false;
    //table fields
    protected $fillable = ['descripcion','id_reg','status'];


    /**Table relationships is related to region has a one-to-many relationship with customers**/
    public function region(){
        return $this->belongsTo('App\Models\Region','id_reg');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer','id_com');
    }
    /*******************************************************************************************/
    //laravel is told that the primary key is id_com
    public function getKeyName(){
        return "id_com";
    }
}
