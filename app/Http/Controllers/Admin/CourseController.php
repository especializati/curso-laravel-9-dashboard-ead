<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreUpdateCourse;
use App\Services\CourseService;
use App\Services\UploadFile;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $courses = $this->service->getAll(
            filter: $request->filter ?? ""
        );

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(StoreUpdateCourse $request, UploadFile $uploadFile)
    {
        $data = $request->only(['name', 'description']);
        $data['available'] = isset($request->available);

        if ($request->image) {
            $data['image'] = $uploadFile->store($request->image, 'courses');
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }

    public function edit($id)
    {
        if (!$course = $this->service->findById($id))
            return back();

        return view('admin.courses.edit', compact('course'));
    }

    public function update(StoreUpdateCourse $request, UploadFile $uploadFile, $id)
    {
        $data = $request->only(['name', 'description']);
        $data['available'] = isset($request->available);

        if ($request->image) {
            // remove old image
            $course = $this->service->findById($id);
            if ($course && $course->image) {
                $uploadFile->removeFile($course->image);
            }

            // upload new image
            $data['image'] = $uploadFile->store($request->image, 'courses');
        }

        $this->service->update($id, $data);

        return redirect()->route('courses.index');
    }

    public function show($id)
    {
        if (!$course = $this->service->findById($id))
            return back();

        return view('admin.courses.show', compact('course'));
    }

    public function destroy($id)
    {
        if (!$this->service->delete($id))
            return back();

        return redirect()->route('courses.index');
    }
}
