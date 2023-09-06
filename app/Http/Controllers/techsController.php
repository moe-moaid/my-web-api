<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\techsSet;

class techsController extends Controller
{
    public function getTechs() {
        return techsSet::all();
    }

    public function postTechs(Request $request) {
        $validatedData = $this->validate($request, [
            'tech_name' => 'required',
            'tech_image' => 'required',
        ]);

        // Handle file upload
        if ($request->hasFile('tech_image')) {
            $fileName = str_replace(' ', '_', $request->file('tech_image')->getClientOriginalName());
            $publicPath = base_path('public/assets');
            $path = $request->file('tech_image')->move($publicPath, $fileName); // Save the file to the public/assets directory
            $url = url('assets/'.$fileName); // Generate the public URL for the uploaded file
            $validatedData['tech_image'] = $url; // Store the URL in the database field
        }

        // Check if the title already exists in the database
        $existingExp = techsSet::where('tech_name', $validatedData['tech_name'])->first();
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
            techsSet::create($validatedData);
            return response()->json(
                [
                    'message' => 'Record created successfully',
                    'code' => 201
                ]
            );
        }
    }
}
