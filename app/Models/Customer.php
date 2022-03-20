<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'customers';
    public $timestamps = false;
    protected $fillable = ['id_reg','id_com','email','name','last_name','address','status','date_reg'];

    public function commune(){
        return $this->belongsTo('App\Models\Commune','id_com');
    }

    public function region(){
        return $this->belongsTo('App\Models\Region','id_reg');
    }

    public function getKeyName(){
        return "dni";
    }
}
