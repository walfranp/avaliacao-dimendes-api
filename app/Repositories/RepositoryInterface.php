<?php

namespace App\Repositories;

interface RepositoryInterface
{

    public function all();

    public function find(int $id);

    public function create(Array $attributes);

    public function update(Array $attributes);

    public function delete();


}
