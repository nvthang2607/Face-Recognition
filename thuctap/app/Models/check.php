<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class check extends Model
{
    use HasFactory;
    protected $table ="check";
    public function agent(){
        return $this->belongsTo('App\Models\agent','id_user','id');
    }
}
