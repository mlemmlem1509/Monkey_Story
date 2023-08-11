<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function index()
    {
        return $this->model->all();
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function view($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function edit($id)
    {
        $result = $this->model->find($id);

        return $result;
    }

    public function update( $attributes = [], $id)
    {
        $result = $this->view($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->view($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }
}
