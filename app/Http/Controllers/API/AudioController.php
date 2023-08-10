<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class AudioController extends Controller
{
    public function index()
    {
        $audios = Audio::all();
        if($audios->count() > 0){
            return response()->json([
                'status' => 200,
                'audios' => $audios
            ], 200);

        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No audio found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validatorAudio = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'path' => 'required|string|max:191'
        ]);

        if($validatorAudio->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorAudio->messages()
            ], 422);
        } else {
            $audio = Audio::create([
                'name' => $request->name,
                'path' => $request->path
            ]);

            if($audio){
                return response()->json([
                    'status' => 200,
                    'message' => "Audio created"
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
        $audio = Audio::find($id);
        if($audio) {
            return response()->json([
                'status' => 200,
                'audio' => $audio
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Audio Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $audio = Audio::find($id);
        if($audio) {
            return response()->json([
                'status' => 200,
                'audio' => $audio
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Audio Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validatorAudio = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'path' => 'required|string|max:191'
        ]);

        if($validatorAudio->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorAudio->messages()
            ], 422);
        } else {
            $audio = Audio::find($id);

            if($audio){
                $audio->update([
                    'name' => $request->name,
                    'path' => $request->path
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Audio updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Audio Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $audio = Audio::find($id);
        if($audio) {
            $audio->delete();
            return response()->json([
                'status' => 200,
                'message' => "Audio deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Audio Found!"
            ], 404);
        }
    }
}
