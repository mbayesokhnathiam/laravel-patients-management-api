<?php

namespace App\Repositories;


interface BaseRepositoryInterface
{
    public function getBy($column, $value);

    public function getFirstBy($column, $value);

    public function getById($id);

    public function all();

    public function create(array $inputs);

    public function update($model, array $inputs);

    public function delete($id);

    public function find($id);

    public function getPaginate($page);

}

