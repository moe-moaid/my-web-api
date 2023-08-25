<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aboutSection;

class aboutController extends Controller
{

    public function getAbout() {
        
        return aboutSection::all();
    }

    public function postAbout(Request $request) {

        // Validate the request data
        $validatedData = $this->validate($request, [
            'title' => 'required|unique:aboutsection,title', // Ensures uniqueness of title
            'description' => 'required',
            'aboutImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add validation rules for other fields as needed
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
        $existingAbout = aboutSection::where('title', $validatedData['title'])->first();
        // validate the uploaded image

        if ($existingAbout) {
            // Update the existing record
            $existingAbout->update($validatedData);
            return response()->json(
                [
                    'message' => 'Record updated successfully',
                    'code' => 200
                ]);
        } else {
            // Create a new record
            aboutSection::create($validatedData);
            return response()->json(
                [
                    'message' => 'Record created successfully',
                    'code' => 200
                ]
            );
        }
    }
}
