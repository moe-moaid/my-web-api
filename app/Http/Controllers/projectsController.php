<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectsSection;

class projectsController extends Controller
{
    public function getProjects() {
        return projectsSection::all();
    }
}
