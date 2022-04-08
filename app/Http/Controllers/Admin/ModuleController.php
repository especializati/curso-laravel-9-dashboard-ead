<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\ModuleRepositoryInterface;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    protected $repository;
    protected $repositoryCourse;

    public function __construct(
        CourseRepositoryInterface $repositoryCourse,
        ModuleRepositoryInterface $repository
    ) {
        $this->repositoryCourse = $repositoryCourse;
        $this->repository = $repository;
    }

    public function index($courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
            return back();

        $data = $this->repository->getAllByCourseId($courseId);
        $modules = convertItemsOfArrayToObject($data);

        return view('admin/courses/modules/index-modules', compact('course', 'modules'));
    }
}
