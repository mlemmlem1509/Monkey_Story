<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\StoryRepository\StoryRepository;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    protected $storyRepository;
    public function __construct(StoryRepository $storyRepository)
    {
        $this->storyRepository = $storyRepository;
    }
    public function index(){
        return $this->storyRepository->all();
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:1000',
            'authorName' => 'required|max:1000',
            'illustratorName' => 'required|max:1000',
            'imageID' => 'required|integer|min:1'
        ]);
        return $this->storyRepository->create($request->all());
    }
    public function view($idStory){
        return $this->storyRepository->find($idStory);
    }
    public function update(Request $request,$idStory){
        $request->validate([
            'name' => 'required|max:1000',
            'authorName' => 'required|max:1000',
            'illustratorName' => 'required|max:1000',
            'imageID' => 'required|integer|min:1'
        ]);
        return $this->storyRepository->update($idStory,$request->all());
    }
    public function delete($idStory){
        return $this->storyRepository->delete($idStory);
    }
}
