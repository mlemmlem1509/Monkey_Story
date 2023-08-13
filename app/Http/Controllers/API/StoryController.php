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
        return $this->storyRepository->create($request->all());
    }
    public function view($idStory){
        return $this->storyRepository->find($idStory);
    }
    public function update(Request $request,$idStory){
        return $this->storyRepository->update($idStory,$request->all());
    }
    public function delete($idStory){
        return $this->storyRepository->delete($idStory);
    }
}
