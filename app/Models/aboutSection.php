<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aboutSection extends Model
{
    public $timestamps = false;

    protected $table = "aboutsection";

    protected $fillable = [
        'title',
        'description',
        'aboutImage'
    ];

    public function getImageAttribute($value) {
        return env('APP_URL').$value;
    }
}
