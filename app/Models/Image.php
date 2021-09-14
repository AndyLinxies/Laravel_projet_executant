<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;
    protected $fillable = [
        'src',
        'categorie_id',
    ];
    public function categories(){
        return $this->belongsTo('App\Models\Categorie','categorie_id','id');
    }

}
