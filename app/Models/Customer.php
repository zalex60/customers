<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    //table name
    protected $table = 'customers';
    public $timestamps = false;
    //table fields
    protected $fillable = ['id_reg','id_com','email','name','last_name','address','status','date_reg'];

    //***************Relacion con commuuns Region 
    public function commune(){
        return $this->belongsTo('App\Models\Commune','id_com');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region','id_reg');
    }
/******************************************/
    public function getKeyName(){
        return "dni";
    }
}
