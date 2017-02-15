<?php

namespace Administer\Http\Controllers\Model;

use Facades\Administer\Administer;
use App\Http\Controllers\Controller;

class ModelController extends Controller
{
    /**
     * Show application administer dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($model)
    {
        $model = resolve($model);

        $fields = config('administer.models.'.get_class($model), []);

        return view('administer::model.index')->with(compact('model', 'fields'));
    }
}