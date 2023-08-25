<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactinformation;

class ContactInfoController extends Controller
{
    public function getContactInfo() {
        return contactinformation::all();
    }
}
