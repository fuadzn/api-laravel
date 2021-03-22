<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    protected $table = 'employes';

    protected $fillable = ['name', 'position'];
}
