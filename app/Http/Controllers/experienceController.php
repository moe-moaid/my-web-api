<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\experienceSection;

class experienceController extends Controller
{
    public function getExperiences() {
        return experienceSection::all();
    }

    public function postExperiences(Request $request) {
        // Validate the request data
        $validatedData = $this->validate($request, [
            'position' => 'required|unique:experiencesection,title', // Ensures uniqueness of title
            'company' => 'required',
            'start_date' => 'required',
            'end_date',
            'exp_Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currently_working' => 'mimes:boolean',
            'summery points' => 'required',
            'technologies' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('aboutImage')) {
            $fileName = str_replace(' ', '_', $request->file('aboutImage')->getClientOriginalName());
            $publicPath = base_path('public/assets');
            $path = $request->file('aboutImage')->move($publicPath, $fileName); // Save the file to the public/assets directory
            $url = url('assets/'.$fileName); // Generate the public URL for the uploaded file
            $validatedData['aboutImage'] = $url; // Store the URL in the database field
        }

        // Check if the title already exists in the database
        $existingExp = experiencesection::where('position', $validatedData['position'])->first();
        // validate the uploaded image

        if ($existingExp) {
            // Update the existing record
            $existingExp->update($validatedData);
            return response()->json(
                [
                    'message' => 'Record updated successfully',
                    'code' => 200
                ]);
        } else {
            // Create a new record
            experiencesection::create($validatedData);
            return response()->json(
                [
                    'message' => 'Record created successfully',
                    'code' => 201
                ]
            );
        }
    }
}
