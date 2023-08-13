<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function all()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    public function find($id)
    {
        $data = $this->model->find($id);
        return response()->json($data);
    }

    public function create($attributes = [])
    {
        $this->model->create($attributes);
        return response()->json([
            'status'=>200,
            'message'=>'Data create successfully!'
        ],200);

    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->update($attributes);
            return response()->json([
                'status' => 200,
                'message' => 'Data update successfully!'
            ],200);
        }

        return response()->json([
            'status' => 422,
            'message' => 'Update failed, please try again!'
        ],422);
    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();

            return response()->json([
                'status'=>200,
                'message'=>'Data delete successfully!'
            ],200);
        }

        return response()->json([
            'status'=>404,
            'message'=>'Delete failed, please try again!'
        ],404);
    }
}
