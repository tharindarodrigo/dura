<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Agent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class AgentsController extends Controller
{
    public function index()
    {
        $agents = Agent::with('city')->get();
        return view('agents.index', compact('agents'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Agent::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $agent = new Agent();

        $agent->name = $request->get('name');
        $agent->nic = $request->get('nic');
        $agent->phone = $request->get('phone');
        $agent->agent_code = Agent::generateAgentCode();
        $agent->gender = $request->get('gender');
        $agent->city_id = $request->get('city_id');

        if ($agent->save()) {
            $request->session()->flash('global-success', 'Successfully Created record');
        }

        return $this->index();
    }

    public function edit($id)
    {
        $agents = Agent::with('city')->get();
        $agent = Agent::find($id);

        return view('agents.edit', compact('agent', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), Agent::$rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $agent = Agent::findOrFail($id);

        $agent->name = $request->get('name');
        $agent->nic = $request->get('nic');
        $agent->phone = $request->get('phone');
        $agent->gender = $request->get('gender');
        $agent->city_id = $request->get('city_id');

        if ($agent->save()) {
            $request->session()->flash('global-success', 'Successfully Updated record');
        }

        return redirect()->route('agents.index');
    }

    public function destroy(Request $request, $id)
    {

        try {

            $agent = Agent::with('projects')->findOrFail($id);
            if ($agent->projects()->count()) {
                $request->session()->flash('global-danger', "There are Projects added to This category");
                return redirect()->back();
            }

        } catch (ModelNotFoundException $e) {
            $request->session()->flash('global-danger', $e);
            return redirect()->back();
        }

        if ($agent->delete()) {
            $request->session()->flash('global-success', 'Record Deleted Successfully');
        } else {
            $request->session()->flash('global-warning', 'Problem Deleting Record');
        }

        return redirect()->route('admin.agents.index');
    }
}
