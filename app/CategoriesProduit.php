<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesProduit extends Model
{


    protected $fillable = [
        'nom', 'description'
    ];
}
