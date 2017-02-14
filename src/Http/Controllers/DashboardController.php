<?php

namespace Administer\Http\Controllers;

use Facades\Administer\Administer;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Show application administer dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administer::index');
    }
}