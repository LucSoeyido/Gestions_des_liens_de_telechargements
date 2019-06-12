<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    //
    protected $fillable = ['nom','auteur','type','format','lien'];
}
