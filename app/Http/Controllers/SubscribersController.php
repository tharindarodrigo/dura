<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

class SubscribersController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::with('agent')->get();
        return view('subscribers.index', compact('subscribers'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Subscriber::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subscriber = new Subscriber();

        $subscriber->name = $request->get('name');
        $subscriber->pin = $request->get('pin');

        if ($subscriber->save()) {
            $request->session()->flash('global-success', 'Successfully Created record');
        }

        return $this->index();
    }

    public function edit($id)
    {
        $subscribers = Subscriber::all();
        $subscriber = Subscriber::find($id);

        return view('subscribers.edit', compact('subscriber', 'subscribers'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Subscriber::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $subscriber = Subscriber::findOrFail($id);

        $subscriber->name = $request->get('name');
        $subscriber->pin = $request->get('pin');

        if ($subscriber->save()) {
            $request->session()->flash('global-success', 'Successfully Updated record');
        }

        return $this->index();
    }

    public function destroy(Request $request, $id)
    {

        $subscriber = Subscriber::find($id);

        if ($subscriber->delete()) {
            $request->session()->flash('global-success', 'Record Deleted Successfully');
        } else {
            $request->session()->flash('global-warning', 'Problem Deleting Record');
        }

        return redirect()->route('admin.subscribers.index');
    }
}
