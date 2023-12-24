<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\Services\WerehouseService;
use Illuminate\Http\Request;

class WerehouseController extends Controller
{
    public function __construct(protected WerehouseService $werehouseService)
    {
    }

    public function getInfo(InfoRequest $request)
    {
        return $this->werehouseService->getInfo($request->validated());
    }
}
