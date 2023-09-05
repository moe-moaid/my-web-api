<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectsSection;

class projectsController extends Controller
{
    public function getProjects() {
        $projects = projectsSection::all();
        if (!$projects) {
            return response.json(
                [
                    'message' => 'null',
                    'code' => 200,
                ]);
        }
        return $projects;
    }

    public function postProjects(Request $request) {
        $validatedData = $this->validate($request, [
            'project_image' => 'required',
            'project_title' => 'required',
            'project_desc' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('project_image')) {
            $fileName = str_replace(' ', '_', $request->file('project_image')->getClientOriginalName());
            $publicPath = base_path('public/assets');
            $path = $request->file('project_image')->move($publicPath, $fileName); // Save the file to the public/assets directory
            $url = url('assets/'.$fileName); // Generate the public URL for the uploaded file
            $validatedData['project_image'] = $url; // Store the URL in the database field
        }

        // Check if the title already exists in the database
        $existingExp = experiencesection::where('project_title', $validatedData['project_title'])->first();
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
