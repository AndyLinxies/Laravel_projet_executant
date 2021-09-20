<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "titre",
        'texte',
        'user_id'
    ];

    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
