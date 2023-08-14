<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Repositories\ImageRepository\ImageRepository;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $imageRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
    public function index(){
        return $this->imageRepository->all();
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:1000',
            'path' => 'required|max:1000'
        ]);
        return $this->imageRepository->create($request->all());
    }
    public function view($id){
        return $this->imageRepository->find($id);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:1000',
            'path' => 'required|max:1000'
        ]);
        return $this->imageRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->imageRepository->delete($id);
    }
}
