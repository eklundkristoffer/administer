<?php

namespace Administer\Http\Controllers\Models;

use Facades\Administer\Administer;
use App\Http\Controllers\Controller;

class ModelsController extends Controller
{
    /**
     * Show application administer dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = config('administer.models', []);

        return view('administer::models.index')->with(compact('models'));
    }
}