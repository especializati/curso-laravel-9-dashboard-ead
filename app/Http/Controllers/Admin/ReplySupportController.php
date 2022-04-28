<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReplySupport;
use App\Repositories\ReplySupportRepositoryInterface;
use Illuminate\Http\Request;

class ReplySupportController extends Controller
{
    protected $repository;

    public function __construct(ReplySupportRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function store(StoreReplySupport $request, $supportId)
    {
        $data = $request->only('description', 'support_id');
        $this->repository->createReplyToSupport($data);

        return redirect()->route('supports.show', $supportId);
    }
}
