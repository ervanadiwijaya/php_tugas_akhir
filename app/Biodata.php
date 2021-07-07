<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'nama', 'no_hp', 'alamat', 'hobi', 'foto'
    ];
}
