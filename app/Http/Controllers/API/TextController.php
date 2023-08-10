<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        if($texts->count() > 0){
            return response()->json([
                'status' => 200,
                'texts' => $texts
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No text found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validatorText = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'positionX' => 'required|integer|max:9999',
            'positionY' => 'required|integer|max:9999'
        ]);

        if($validatorText->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorText->messages()
            ], 422);
        } else {
            $text = Text::create([
                'name' => $request->name,
                'positionX' => $request->positionX,
                'positionY' => $request->positionY
            ]);

            if($text){
                return response()->json([
                    'status' => 200,
                    'message' => "Text created"
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
        $text = Text::find($id);
        if($text) {
            return response()->json([
                'status' => 200,
                'text' => $text
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Text Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $text = Text::find($id);
        if($text) {
            return response()->json([
                'status' => 200,
                'text' => $text
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Text Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validatorText = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'positionX' => 'required|integer|max:9999',
            'positionY' => 'required|integer|max:9999'
        ]);

        if($validatorText->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorText->messages()
            ], 422);
        } else {
            $text = Text::find($id);

            if($text){
                $text->update([
                    'name' => $request->name,
                    'positionX' => $request->positionX,
                    'positionY' => $request->positionY,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Text updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Text Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $text = Text::find($id);
        if($text) {
            $text->delete();
            return response()->json([
                'status' => 200,
                'message' => "Text deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Text Found!"
            ], 404);
        }
    }
}
