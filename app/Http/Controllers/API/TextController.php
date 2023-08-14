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
        $request->validate([
            'name' => 'required|max:1000',
            'positionX' => 'required|integer|min:0',
            'positionY' => 'required|integer|min:0'
        ]);
        return $this->textRepository->create($request->all());
    }
    public function view($id){
        return $this->textRepository->find($id);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:1000',
            'positionX' => 'required|integer|min:0',
            'positionY' => 'required|integer|min:0'
        ]);
        return $this->textRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->textRepository->delete($id);
    }
}
