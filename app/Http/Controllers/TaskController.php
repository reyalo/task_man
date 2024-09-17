<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     *
     *
     */


public function index(Request $request)
{


    $status = $request->input('status');
    $sortBy = $request->get('sort_by', 'created_at');
    $sortDirection = $request->get('sort_direction', 'asc');

    if (!in_array($sortDirection, ['asc', 'desc'])) {
        $sortDirection = 'asc';
    }

    $allowedSorts = ['created_at', 'title', 'status', 'submit_time'];

    if (!in_array($sortBy, $allowedSorts)) {
        $sortBy = 'created_at';
    }



    $tasks = Task::orderBy($sortBy, $sortDirection)->get();

        $tasks = Task::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->orderBy($sortBy, $sortDirection)
        ->get();



        // Checking for API
        if ($request->wantsJson()) {
            return new TaskCollection($tasks);
        }


        // return $tasks;

        return view('frontend.task.manageTask', ['tasks' => $tasks]);

}


    public function index2(Request $request)
    {
        // dd($request);
        // return response()->json(Task::all());
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters('title', 'status')
            ->defaultSort('title')
            ->allowedSorts('title', 'created_at')
            ->paginate();


        // Checking for API
        if ($request->wantsJson()) {
            return new TaskCollection($tasks);
        }


        // return $tasks;

        return view('frontend.task.manageTask', ['tasks' => $tasks]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.task.addTask');
    }


    // using request
    public function store(StoreTaskRequest $request)
    {


        $validated = $request->validated();

        $validated['submit_time'] = Carbon::parse($validated['submit_time']);


        // $user = User::find(1);
        $user = Auth::user();



        $task = $user->tasks()->create($validated);



        // Checking for API
        if ($request->wantsJson()) {
            return new TaskResource($task); // convert data json format
        }


        // return $task;
        return redirect()->back()->with('success', 'Task added successfully!');

    }


    //alt of below code, using model binding
    // public function show(Request $request, Task $task)
    public function show(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Checking for API
        if ($request->wantsJson()) {
            return new TaskResource($task); // convert data json format
        }


        return view('frontend.task.showTask', ['task' => $task]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Request $request, Task $task)
    public function edit(Request $request, $id)
    {

        $task = Task::findOrFail($id);
        // Checking for API
        if ($request->wantsJson()) {
            return new TaskResource($task); // convert data json format
        }


        return view('frontend.task.editTask', ['task' => $task]);

    }


    /**
     * Update the specified resource in storage.
     */
    //using request
    // public function update(UpdateTaskRequest $request, Task $task)
    public function update(UpdateTaskRequest $request, $id)
    {
        $validated = $request->validated();
        $task = Task::findOrFail($id);


        $task->update($validated);

        // Checking for API
        if ($request->wantsJson()) {
            return new TaskResource($task); // convert data json format
        }


        return redirect()->back()->with('success', 'Task Updated successfully!');

    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request, Task $task)
    public function destroy(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        if ($request->wantsJson()) {
            return response()->noContent(); // convert data json format
        }

        return redirect()->back()->with('success', 'Task Deleted successfully!');
    }






}
