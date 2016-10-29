<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Agent;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class AgentsController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('from') && $request->has('to')) {

            $from = $request->get('from');
            $to = $request->get('to');
            $subs = Subscriber::with('agent')->where('subscribers.created_at', '>=', $from)->where('subscribers.created_at', '<=', $to)->get();
//            dd($subs);
            $agents = Agent::whereHas('subscribers', function ($query) use ($from, $to) {
                $query->where('subscribers.created_at', '>=', $from)->where('subscribers.created_at', '<=', $to);
            })->first();
            dd(($agents));
        } else {
            $agents = Agent::with('subscribers')->get();
        }


        return view('agents.index', compact('agents'));
    }

    public function create()
    {
        return view('agents.create');
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

        return redirect()->route('agents.index');
    }

    public function edit($id)
    {
        $agents = Agent::with('subscribers')->get();
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

        return redirect()->route('agents.index');
    }

    public function search(Request $request)
    {
        if ($request->has('from') && $request->has('to')) {
            return redirect()->route('agents.search.from.to', [$request->get('from'), $request->get('to')]);
        }

        return redirect()->route('agents.index');
    }

    public function searchAgents($from, $to)
    {
//        $subscribers = Agent::with('subscribers')->whereHas('subscribers', function ($query) use ($from, $to) {
//            $query
//                ->where('created_at', '>=', $from)
//                ->where('created_at', '<=', $to);
//        })->get();

        $agents = Agent::with(['subscribers' => function ($q) use ($from, $to){
            $q->select('pin','subscribers.id')
                ->where('created_at', '>=', $from)
                ->where('created_at', '<=', $to)
            ;
        }])->whereHas('subscribers', function ($query) use ($from, $to) {
            $query
                ->where('created_at', '>=', $from)
                ->where('created_at', '<=', $to);
        })->get();

//        $subscribers = Subscriber::with('agent')->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
        return view('agents.index', compact('agents', 'from', 'to'));
    }
}
