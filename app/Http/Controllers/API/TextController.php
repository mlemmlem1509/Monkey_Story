<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\TextRepository\TextRepository;
use Illuminate\Http\Request;

class TextController extends Controller
{
    protected $textRepository;
    public function __construct(TextRepository $textRepository)
    {
        $this->textRepository = $textRepository;
    }
    public function index(){
        return $this->textRepository->all();
    }
    public function create(Request $request){
        return $this->textRepository->create($request->all());
    }
    public function view($id){
        return $this->textRepository->find($id);
    }
    public function update(Request $request,$id){
        return $this->textRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->textRepository->delete($id);
    }
}
