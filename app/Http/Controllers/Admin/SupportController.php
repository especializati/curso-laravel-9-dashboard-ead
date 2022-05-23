<?php

namespace App\Http\Controllers\Admin;

use App\Enum\SupportEnum;
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
            status: $request->get('status', 'P'),
            page: (int) $request->get('page', 1),
        );

        $statusOptions = SupportEnum::cases();

        return view('admin.supports.index', compact('supports', 'statusOptions'));
    }

    public function show($id)
    {
        if (!$support = $this->service->getSupport($id))
            return back();

        return view('admin.supports.reply-support', compact('support'));
    }
}
