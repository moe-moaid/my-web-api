<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contactinfo extends Model
{

    public $timestamps = false;

    protected $table = "contactinfo";

    protected $fillable = [
        'platform',
        'link',
    ];
}
