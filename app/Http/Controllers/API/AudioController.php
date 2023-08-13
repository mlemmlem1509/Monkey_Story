<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\AudioRepository\AudioRepository;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    protected $audioRepository;
    public function __construct(AudioRepository $audioRepository)
    {
        $this->audioRepository = $audioRepository;
    }
    public function index(){
        return $this->audioRepository->all();
    }
    public function create(Request $request){
        return $this->audioRepository->create($request->all());
    }
    public function view($id){
        return $this->audioRepository->find($id);
    }
    public function update(Request $request,$id){
        return $this->audioRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->audioRepository->delete($id);
    }
}
