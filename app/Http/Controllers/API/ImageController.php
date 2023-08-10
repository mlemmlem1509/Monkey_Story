<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        if($images->count() > 0){
            return response()->json([
                'status' => 200,
                'images' => $images
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No image found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validatorImage = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'path' => 'required|string|max:191'
        ]);

        if($validatorImage->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorImage->messages()
            ], 422);
        } else {
            $image = Image::create([
                'name' => $request->name,
                'path' => $request->path
            ]);

            if($image){
                return response()->json([
                    'status' => 200,
                    'message' => "Image created"
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => "Something went wrong!"
                ], 500);
            }
        }
    }

    public function view($id)
    {
        $image = Image::find($id);
        if($image) {
            return response()->json([
                'status' => 200,
                'image' => $image
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Image Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $image = Image::find($id);
        if($image) {
            return response()->json([
                'status' => 200,
                'image' => $image
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Image Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validatorImage = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'path' => 'required|string|max:191'
        ]);

        if($validatorImage->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorImage->messages()
            ], 422);
        } else {
            $image = Image::find($id);

            if($image){
                $image->update([
                    'name' => $request->name,
                    'path' => $request->path
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Image updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Image Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $image = Image::find($id);
        if($image) {
            $image->delete();
            return response()->json([
                'status' => 200,
                'message' => "Image deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Image Found!"
            ], 404);
        }
    }
}
