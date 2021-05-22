<?php

namespace App\Http\Controllers;

use App\Models\FcstmrType;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\API\Task\Store;
use App\Http\Requests\API\Task\Update;
use Illuminate\Support\Facades\View;


class TaskController extends Controller
{
    // space that we can use the repository from
   protected $model;

   public function __construct(FcstmrType $task)
   {
       // set the model
       $this->model = new TaskRepository($task);
   }

   public function index(Request $request)
   {  
      if($request->sort && $request->keywords){
        dd($request);
      } 
      $records = $this->model->all();
      return View::make('task.index', compact('records'));
   }

   public function store(Store $request)
   {
      // create record and pass in only fields that are fillable
      return $this->model->create($request->only($this->model->getModel()->fillable));
   }

   public function show($id)
   {
       return $this->model->show($id);
   }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = $this->model->show($id);
        return response()->json($records);
    }

   public function update(Update $request, $id)
   {
       // update model and only pass in the fillable fields
       $this->model->update($request->only($this->model->getModel()->fillable), $id);
       return $this->model->show($id);
   }

   public function destroy($id)
   {
       return $this->model->delete($id);
   }
}
