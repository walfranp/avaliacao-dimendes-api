<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = Task::class;
    }

    public function all()
    {

    }

    public function find(int $id)
    {

    }

    public function create(array $attributes)
    {

    }

    public function update(array $attributes)
    {

    }

    public function delete()
    {

    }

}
