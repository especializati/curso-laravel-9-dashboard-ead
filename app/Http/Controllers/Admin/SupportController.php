<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    protected $service;

    public function __construct(SupportService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $supports = $this->service->getSupports(
            status: $request->get('status', 'P')
        );

        return view('admin.supports.index', compact('supports'));
    }

    public function show($id)
    {
        if (!$support = $this->service->getSupport($id))
            return back();

        return view('admin.supports.reply-support', compact('support'));
    }
}
