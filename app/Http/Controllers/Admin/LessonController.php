<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\ModuleRepositoryInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $repository;
    protected $repositoryModule;

    public function __construct(
        ModuleRepositoryInterface $repositoryModule,
        LessonRepositoryInterface $repository
    ) {
        $this->repositoryModule = $repositoryModule;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
            return back();

        $data = $this->repository->getAllByModuleId(
            $moduleId,
            $request->filter ?? ''
        );
        $lessons = convertItemsOfArrayToObject($data);

        return view('admin/courses/modules/lessons/index-lessons', compact('module', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($moduleId)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
            return back();

        return view('admin/courses/modules/lessons/create-lessons', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLesson $request, $moduleId)
    {
        if (!$this->repositoryModule->findById($moduleId))
            return back();

        $data = $request->only(['name', 'video', 'description']);

        $this->repository->createByModule($moduleId, $data);

        return redirect()->route('lessons.index', $moduleId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId, $id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
            return back();

        if (!$lesson = $this->repository->findById($id))
            return back();

        return view('admin/courses/modules/lessons/show-lessons', compact('module', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($moduleId, $id)
    {
        if (!$module = $this->repositoryModule->findById($moduleId))
            return back();

        if (!$lesson = $this->repository->findById($id))
            return back();

        return view('admin/courses/modules/lessons/edit-lessons', compact('module', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLesson $request, $moduleId, $id)
    {
        if (!$this->repositoryModule->findById($moduleId))
            return back();

        $this->repository->update($id, $request->validated());

        return redirect()->route('lessons.index', $moduleId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($moduleId, $id)
    {
        if (!$this->repository->delete($id))
            return back();

        return redirect()->route('lessons.index', $moduleId);
    }
}
