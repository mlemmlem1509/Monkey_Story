<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\PageContentRepository\PageContentRepository;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    protected $contentRepository;
    public function __construct(PageContentRepository $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }
    public function index(){
        return $this->contentRepository->all();
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:1000',
            'positionX' => 'required|integer|min:0',
            'positionY' => 'required|integer|min:0',
            'width' => 'required|integer|min:0',
            'height' => 'required|integer|min:0'
        ]);
        return $this->contentRepository->create($request->all());
    }
    public function view($id){
        return $this->contentRepository->find($id);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:1000',
            'positionX' => 'required|integer|min:0',
            'positionY' => 'required|integer|min:0',
            'width' => 'required|integer|min:0',
            'height' => 'required|integer|min:0'
        ]);
        return $this->contentRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->contentRepository->delete($id);
    }
}
