<?php

namespace App\Http\Controllers;

use Inertia\Response;

class DashboardIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(): Response
    {
        return inertia()->render('Admin/Dashboard');
    }
}
