<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository\PageRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $pageRepository;
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }
    public function index(){
        return $this->pageRepository->all();
    }
    public function create(Request $request){
        return $this->pageRepository->create($request->all());
    }
    public function view($id){
        return $this->pageRepository->find($id);
    }
    public function update(Request $request,$id){
        return $this->pageRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->pageRepository->delete($id);
    }
}
