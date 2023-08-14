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
        $request->validate([
           'pageNumber' => 'required|integer|min:1',
           'background' => 'required|max:1000'
        ]);
        return $this->pageRepository->create($request->all());
    }
    public function view($id){
        return $this->pageRepository->find($id);
    }
    public function update(Request $request,$id){
        $request->validate([
            'pageNumber' => 'required|integer|min:1',
            'background' => 'required|max:1000'
        ]);
        return $this->pageRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->pageRepository->delete($id);
    }
}
