<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class experienceSection extends Model
{

    public $timestamps = false;

    protected $table = 'experiencesection';

    protected $fillable = [
        'position',
        'company',
        'start_date',
        'end_date',
        'exp_Image',
        'currently_working',
        'summery',
        'technologies',
    ];

    public function getImageAttribute($value) {
        return env('APP_URL').$value;
    }
}