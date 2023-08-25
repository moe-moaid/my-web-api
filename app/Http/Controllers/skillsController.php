<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\skillsSection;

class skillsController extends Controller
{
    public function getSkills() {
        return skillsSection::all();
    }
}
