<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function index();

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function view($id);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function edit($id);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($attributes = [],$id);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
