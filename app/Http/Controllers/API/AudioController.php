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
        $request->validate([
            'name' => 'required|max:1000',
            'path' => 'required|max:1000',
            'textID' => 'required|integer|min:1'
        ]);
        return $this->audioRepository->create($request->all());
    }
    public function view($id){
        return $this->audioRepository->find($id);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|max:1000',
            'path' => 'required|max:1000',
            'textID' => 'required|integer|min:1'
        ]);
        return $this->audioRepository->update($id,$request->all());
    }
    public  function delete($id){
        return $this->audioRepository->delete($id);
    }
}
