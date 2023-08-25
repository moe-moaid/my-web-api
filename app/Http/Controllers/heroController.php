<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\heroSection;

class heroController extends Controller
{
    public function getHero() {
        return heroSection::all();
    }
}
