<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\experienceSection;

class experienceController extends Controller
{
    public function getExperiences() {
        $experiences = experienceSection::all();

        // Transform experiences to array
        $experiences->transform(function($experience){
            $experience->technologies = explode(',', $experience->technologies);
            $experience->summery = explode(',', $experience->summery);
            return $experience;
        });

        return [
            'experiences' => $experiences,
        ];
    }

    public function postExperiences(Request $request) {
        // Validate the request data
        $validatedData = $this->validate($request, [
            'position' => 'required|unique:experiencesection,position', // Ensures uniqueness of position
            'company' => 'required',
            'start_date' => 'required',
            'end_date',
            'exp_Image' => 'required',
            'currently_working' => 'required',
            'summery' => 'required',
            'technologies' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('exp_Image')) {
            $fileName = str_replace(' ', '_', $request->file('exp_Image')->getClientOriginalName());
            $publicPath = base_path('public/assets');
            $path = $request->file('exp_Image')->move($publicPath, $fileName); // Save the file to the public/assets directory
            $url = url('assets/'.$fileName); // Generate the public URL for the uploaded file
            $validatedData['exp_Image'] = $url; // Store the URL in the database field
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
