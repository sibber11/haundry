<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends AppBaseController
{
    /**
     * Display a listing of the Service.
     */
    public function index(Request $request)
    {
        /** @var  Service $services */
        $services = Service::paginate(10);

        return view('admin.services.index')
            ->with('services', $services);
    }


    /**
     * Show the form for creating a new Service.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created Service in storage.
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        /** @var  Service $service */
        $service = Service::create($input);

        Flash::success('Service saved successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Display the specified Service.
     */
    public function show($id)
    {
        /** @var  Service $service */
        $service = Service::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     */
    public function edit($id)
    {
        /** @var  Service $service */
        $service = Service::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.edit')->with('service', $service);
    }

    /**
     * Update the specified Service in storage.
     */
    public function update($id, UpdateServiceRequest $request)
    {
        /** @var  Service $service */
        $service = Service::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        $service->fill($request->all());
        $service->save();

        Flash::success('Service updated successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @throws  \Exception
     */
    public function destroy($id)
    {
        /** @var  Service $service */
        $service = Service::find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        $service->delete();

        Flash::success('Service deleted successfully.');

        return redirect(route('admin.services.index'));
    }
}
