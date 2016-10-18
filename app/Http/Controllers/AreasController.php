<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use Illuminate\Support\Facades\Validator;
use Illuminate\Session;
use App\Http\Requests;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Area::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $city = new Area();

        $city->city_id = $request->get('city_id');
        $city->area = $request->get('area');

        if ($city->save()) {
            $request->session()->flash('global-success', 'Successfully Created record');
        }

        return $this->index();
    }

    public function edit($id)
    {
        $areas = Area::all();
        $area = Area::find($id);
        return view('areas.edit', compact('area', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Area::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $city = Area::findOrFail($id);

        $city->city_id = $request->get('city_id');
        $city->area = $request->get('area');

        if ($city->save()) {
            $request->session()->flash('global-success', 'Successfully Updated record');
        }

        return redirect()->route('areas.index');
    }

    public function destroy(Request $request, $id)
    {

        try {

            $city = Area::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            $request->session()->flash('global-danger', $e);
            return redirect()->back();
        }

        if ($city->delete()) {
            $request->session()->flash('global-success', 'Record Deleted Successfully');
        } else {
            $request->session()->flash('global-warning', 'Problem Deleting Record');
        }

        return redirect()->route('areas.index');
    }
}
