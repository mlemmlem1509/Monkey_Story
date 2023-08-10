<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class PageContentController extends Controller
{
    public function index()
    {
        $contents = PageContent::all();
        if($contents->count() > 0){
            return response()->json([
                'status' => 200,
                'contents' => $contents
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No content found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validatorContent = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'positionX' => 'required|integer|max:9999',
            'positionY' => 'required|integer|max:9999',
            'width' => 'required|integer|max:9999',
            'height' => 'required|integer|max:9999',
        ]);

        if($validatorContent->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorContent->messages()
            ], 422);
        } else {
            $content = PageContent::create([
                'name' => $request->name,
                'positionX' => $request->positionX,
                'positionY' => $request->positionY,
                'width' => $request->width,
                'height' => $request->height
            ]);

            if($content){
                return response()->json([
                    'status' => 200,
                    'message' => "Content created"
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
        $content = PageContent::find($id);
        if($content) {
            return response()->json([
                'status' => 200,
                'content' => $content
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Content Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $content = PageContent::find($id);
        if($content) {
            return response()->json([
                'status' => 200,
                'content' => $content
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Content Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validatorContent = Facades\Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'positionX' => 'required|integer|max:9999',
            'positionY' => 'required|integer|max:9999',
            'width' => 'required|integer|max:9999',
            'height' => 'required|integer|max:9999',
        ]);

        if($validatorContent->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorContent->messages()
            ], 422);
        } else {
            $content = PageContent::find($id);

            if($content){
                $content->update([
                    'name' => $request->name,
                    'positionX' => $request->positionX,
                    'positionY' => $request->positionY,
                    'width' => $request->width,
                    'height' => $request->height
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Content updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Content Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $content = PageContent::find($id);
        if($content) {
            $content->delete();
            return response()->json([
                'status' => 200,
                'message' => "Content deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Content Found!"
            ], 404);
        }
    }
}
