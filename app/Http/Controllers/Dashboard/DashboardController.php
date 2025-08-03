<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\UserPropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{

    public function __construct(
        protected UserPropertyService $propertyService
    ){
    }

    public function show(Request $request): Response
    {
        return Inertia::render('Dashboard', [
            'userProperties' => $this->propertyService->getUserProperties($request->user())
        ]);
    }
}
