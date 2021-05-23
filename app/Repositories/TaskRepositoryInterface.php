<?php 
namespace App\Repositories;
use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function show($id);

    public function filter(Request $request);
}