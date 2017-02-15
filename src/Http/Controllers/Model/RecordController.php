<?php

namespace Administer\Http\Controllers\Model;

use Illuminate\Http\Request;
use Facades\Administer\Administer;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    /**
     * Show application administer record edit page.
     *
     * @param  string          $model
     * @param  integer|string  $key
     * @return \Illuminate\Http\Response
     */
    public function form($model, $key)
    {
        $record = resolve($model)->find($key);

        $fields = config('administer.models.'.get_class($record), []);

        return view('administer::model.record')->with(compact('record', 'fields'));
    }

    /**
     * Handle the administer record edit request.
     *
     * @param  string          $model
     * @param  integer|string  $key
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request, $model, $key)
    {
        $record = resolve($model)->find($key);
        $updatedFields = $request->except('_token');
        $editableFields = config('administer.models.'.get_class($record), [])['editable_fields'];

        foreach($updatedFields as $field => $value) {
            if (! in_array($field, $editableFields)) {
                continue;
            }

            $record->{$field} = $value;
        }

        $record->save();

        return back()->withSuccess(trans('administer::model.record.success'));
    }
}