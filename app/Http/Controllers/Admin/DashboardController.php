<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StatisticsRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        protected StatisticsRepositoryInterface $repository
    ) {}

    public function index()
    {
        $totalUsers = $this->repository->getTotalUsers();
        $totalAdmins = $this->repository->getTotalAdmins();
        $totalCourses = $this->repository->getTotalCourses();
        $totalSupports = $this->repository->getTotalSupports();

        return view('admin.home.index', compact('totalUsers', 'totalAdmins', 'totalCourses', 'totalSupports'));
    }
}
