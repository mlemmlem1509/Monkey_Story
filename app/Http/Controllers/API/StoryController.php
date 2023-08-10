<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::all();
        if($stories->count() > 0){
            return response()->json([
                'status' => 200,
                'stories' => $stories
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No story found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validator = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'authorName' => 'required|string|max:191',
            'illustratorName' => 'required|string|max:191',
            'thumbnail' => 'required|string|max:191'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $story = Story::create([
                'name' => $request->name,
                'authorName' => $request->authorName,
                'illustratorName' => $request->illustratorName,
                'thumbnail' => $request->thumbnail
            ]);

            if($story){
                return response()->json([
                    'status' => 200,
                    'message' => "Story created"
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
        $story = Story::find($id);
        if($story) {
            return response()->json([
                'status' => 200,
                'story' => $story
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Story Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $story = Story::find($id);
        if($story) {
            return response()->json([
                'status' => 200,
                'story' => $story
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Story Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validator = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'authorName' => 'required|string|max:191',
            'illustratorName' => 'required|string|max:191',
            'thumbnail' => 'required|string|max:191'
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $story = Story::find($id);

            if($story){
                $story->update([
                    'name' => $request->name,
                    'authorName' => $request->authorName,
                    'illustratorName' => $request->illustratorName,
                    'thumbnail' => $request->thumbnail
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Story updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Story Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $story = Story::find($id);
        if($story) {
            $story->delete();
            return response()->json([
                'status' => 200,
                'message' => "Story deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Story Found!"
            ], 404);
        }
    }
}
