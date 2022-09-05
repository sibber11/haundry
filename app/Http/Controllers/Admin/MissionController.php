<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateMissionRequest;
use App\Http\Requests\UpdateMissionRequest;
use App\Models\Mission;
use Flash;
use Illuminate\Http\Request;

class MissionController extends AppBaseController
{
    /**
     * Display a listing of the Mission.
     */
    public function index(Request $request)
    {
        /** @var  Mission $missions */
        $missions = Mission::paginate(10);

        return view('admin.missions.index')
            ->with('missions', $missions);
    }


    /**
     * Show the form for creating a new Mission.
     */
    public function create()
    {
        return view('admin.missions.create');
    }

    /**
     * Store a newly created Mission in storage.
     */
    public function store(CreateMissionRequest $request)
    {
        $input = $request->all();

        /** @var  Mission $mission */
        $mission = Mission::create($input);

        Flash::success('Mission saved successfully.');

        return redirect(route('admin.missions.index'));
    }

    /**
     * Display the specified Mission.
     */
    public function show($id)
    {
        /** @var  Mission $mission */
        $mission = Mission::find($id);

        if (empty($mission)) {
            Flash::error('Mission not found');

            return redirect(route('admin.missions.index'));
        }

        return view('admin.missions.show')->with('mission', $mission);
    }

    /**
     * Show the form for editing the specified Mission.
     */
    public function edit($id)
    {
        /** @var  Mission $mission */
        $mission = Mission::find($id);

        if (empty($mission)) {
            Flash::error('Mission not found');

            return redirect(route('admin.missions.index'));
        }

        return view('admin.missions.edit')->with('mission', $mission);
    }

    /**
     * Update the specified Mission in storage.
     */
    public function update($id, UpdateMissionRequest $request)
    {
        /** @var  Mission $mission */
        $mission = Mission::find($id);

        if (empty($mission)) {
            Flash::error('Mission not found');

            return redirect(route('admin.missions.index'));
        }

        $mission->fill($request->all());
        $mission->save();

        Flash::success('Mission updated successfully.');

        return redirect(route('admin.missions.index'));
    }

    /**
     * Remove the specified Mission from storage.
     *
     * @throws  \Exception
     */
    public function destroy($id)
    {
        /** @var  Mission $mission */
        $mission = Mission::find($id);

        if (empty($mission)) {
            Flash::error('Mission not found');

            return redirect(route('admin.missions.index'));
        }
        if ($mission->status == 'completed' || $mission->status == 'running')
        {
            Flash::error("Mission not deleteable!");
        }else{
            $mission->delete();
            Flash::success('Mission deleted successfully.');
        }


        return redirect(route('admin.missions.index'));
    }

    public function assign_orders(Request $request)
    {
        $request->validate([
            'order_id' => 'required|array',
            'mission_id' => 'required|numeric'
        ]);
        $id = $request->input('mission_id');
        /** @var  Mission $mission */
        $mission = Mission::find($id);

        if (empty($mission)) {
            Flash::error('Mission not found');

            return redirect(route('admin.missions.index'));
        }
        $orders = $request->input('order_id');
        $mission->assign_orders($orders);
        return redirect()->route('admin.missions.show', $mission);
    }

    public function start()
    {
        $mission = auth()->user()->mission;
        $mission->start();
        return redirect()->route('admin.missions.show', $mission);
    }

    public function end()
    {
        /** @var Mission $mission */
        $mission = auth()->user()->mission;
        $mission->complete();
        return redirect()->route('admin.missions.show', $mission);
    }
}
