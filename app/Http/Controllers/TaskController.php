<?php

namespace App\Http\Controllers;

use App\DTO\Task\TaskSearchDTO;
use App\Enums\Task\TaskStatusType;
use App\Http\Requests\Task\StoreAndUpdateTaskRequest;
use App\Http\Requests\Task\TaskIndexSearchRequest;
use App\Models\Task;
use App\Models\User;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

class TaskController extends Controller
{
    /**
     * @param TaskRepositoryInterface $taskRepository
     */
    public function __construct(
        private readonly TaskRepositoryInterface $taskRepository
    ) {
    }

    /**
     * @param TaskIndexSearchRequest $request
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     *
     */
    public function index(TaskIndexSearchRequest $request)
    {
        $taskSearchDTO = new TaskSearchDTO(Auth::user()?->id ?? 0, $request->get('title'));
        $tasksCollection = $this->taskRepository->searchByDTO($taskSearchDTO);

        return view('task.index', [
            'data' => $tasksCollection
        ]);
    }

    /**
     * @param Task $task
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    public function create()
    {
        return view('task.create', ['statuses' => TaskStatusType::cases()]);
    }

    /**
     * @param \App\Http\Requests\Task\StoreAndUpdateTaskRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreAndUpdateTaskRequest $request)
    {
        $task = Task::make($request->only('title', 'description', 'status'));
        $task->setUser(Auth::user());
        $task->save();

        return redirect(route('task.show', [$task->id]));
    }

    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task,
            'statuses' => TaskStatusType::cases()
        ]);
    }

    /**
     * @param \App\Models\Task $task
     * @param \App\Http\Requests\Task\StoreAndUpdateTaskRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     *
     */
    public function update(Task $task, StoreAndUpdateTaskRequest $request)
    {
        $task->update($request->only('title', 'description', 'status'));
        return redirect(route('task.show', [$task->id]));
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect(route('task.index'));
    }
}
