<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class techsSet extends Model
{
    public $timestamps = false;

    protected $table = 'tech_set';

    protected $fillable = [
        'tech_name',
        'tech_image',
    ];

    public function getImageAttribute($value) {
        return env('APP_URL').$value;
    }
}
