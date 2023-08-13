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
        return $this->contentRepository->create($request->all());
    }
    public function view($id){
        return $this->contentRepository->find($id);
    }
    public function update(Request $request,$id){
        return $this->contentRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->contentRepository->delete($id);
    }
}
