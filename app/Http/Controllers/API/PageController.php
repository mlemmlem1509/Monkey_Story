<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        if($pages->count() > 0){
            return response()->json([
                'status' => 200,
                'pages' => $pages
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No page found'
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $validatorPage = Facades\Validator::make($request->all(), [
            'pageNumber' => 'required|integer|max:9999',
            'background' => 'required|string|max:191'
        ]);

        if($validatorPage->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorPage->messages()
            ], 422);
        } else {
            $page = Page::create([
                'pageNumber' => $request->pageNumber,
                'background' => $request->background
            ]);

            if($page){
                return response()->json([
                    'status' => 200,
                    'message' => "Page created"
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
        $page = Page::find($id);
        if($page) {
            return response()->json([
                'status' => 200,
                'page' => $page
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Page Found!"
            ], 404);
        }
    }

    public function edit($id)
    {
        $page = Page::find($id);
        if($page) {
            return response()->json([
                'status' => 200,
                'page' => $page
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Page Found!"
            ], 404);
        }
    }

    public function update(Request $request, int $id)
    {
        $validatorPage = Facades\Validator::make($request->all(), [
            'pageNumber' => 'required|integer|max:9999',
            'background' => 'required|string|max:191'
        ]);

        if($validatorPage->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validatorPage->messages()
            ], 422);
        } else {
            $page = Page::find($id);

            if($page){
                $page->update([
                    'pageNumber' => $request->pageNumber,
                    'background' => $request->background
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Page updated"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "No Page Found!"
                ], 404);
            }
        }
    }

    public function delete($id)
    {
        $page = Page::find($id);
        if($page) {
            $page->delete();
            return response()->json([
                'status' => 200,
                'message' => "Page deleted!!"
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "No Page Found!"
            ], 404);
        }
    }
}
