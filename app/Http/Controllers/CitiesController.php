<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), City::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $city = new City();

        $city->city = $request->get('city');

        if ($city->save()) {
            $request->session()->flash('global-success', 'Successfully Created record');
        }

        return $this->index();
    }

    public function edit($id)
    {
        $cities = City::all();
        $city = City::find($id);

        return view('cities.edit', compact('city', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), City::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $city = City::findOrFail($id);

        $city->city = $request->get('city');

        if ($city->save()) {
            $request->session()->flash('global-success', 'Successfully Updated record');
        }

        return redirect()->route('cities.index');
    }

    public function destroy(Request $request, $id)
    {

        try {

            $city = City::findOrFail($id);

        } catch (ModelNotFoundException $e) {
            $request->session()->flash('global-danger', $e);
            return redirect()->back();
        }

        if ($city->delete()) {
            $request->session()->flash('global-success', 'Record Deleted Successfully');
        } else {
            $request->session()->flash('global-warning', 'Problem Deleting Record');
        }

        return redirect()->route('admin.cities.index');
    }

    public function getAreas($cityId)
    {
        $areas = Area::where('city_id', $cityId)->pluck('area','id');
//        dd($cityId);
        return $areas;
    }
}
