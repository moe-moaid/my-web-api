<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactinfo;

class ContactInfoController extends Controller
{
    public function getContactInfo() {
        return contactinfo::all();
    }

    public function postContactInfo(Request $request) {
        // Validate the request data
        $validatedData = $this->validate($request, [
            'platform' => 'required|unique:socialmediaaccounts,platform', // Ensures uniqueness of title
            'link' => 'required',
        ]);

        // Check if the title already exists in the database
        $existingInfo = contactinfo::where('platform', $validatedData['platform'])->first();
        
        if ($existingInfo) {
            // Update the existing record
            $existingInfo->update($validatedData);
            return response()->json(
                [
                    'message' => 'Record updated successfully',
                    'code' => 200
                ]);
        } else {
            // Create a new record
            contactinfo::create($validatedData);
            return response()->json(
                [
                    'message' => 'Record created successfully',
                    'code' => 201
                ]
            );
        }
    }
}
