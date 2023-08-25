<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\experienceSection;

class experienceController extends Controller
{
    public function getExperiences() {
        return experienceSection::all();
    }
}
