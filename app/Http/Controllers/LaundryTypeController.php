<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use App\Models\LaundryType;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateLaundryTypeRequest;
use App\Http\Requests\UpdateLaundryTypeRequest;

class LaundryTypeController extends AppBaseController
{
    /**
     * Display a listing of the LaundryType.
     */
    public function index(Request $request)
    {
        /** @var  LaundryType $laundryTypes */
        $laundryTypes = LaundryType::paginate(10);

        return view('admin.laundry_types.index')
            ->with('laundryTypes', $laundryTypes);
    }


    /**
     * Show the form for creating a new LaundryType.
     */
    public function create()
    {
        return view('admin.laundry_types.create');
    }

    /**
     * Store a newly created LaundryType in storage.
     */
    public function store(CreateLaundryTypeRequest $request)
    {
        $input = $request->all();

        /** @var  LaundryType $laundryType */
        $laundryType = LaundryType::create($input);

        Flash::success('Laundry Type saved successfully.');

        return redirect(route('admin.laundryTypes.index'));
    }

    /**
     * Display the specified LaundryType.
     */
    public function show($id)
    {
        /** @var  LaundryType $laundryType */
        $laundryType = LaundryType::find($id);

        if (empty($laundryType)) {
            Flash::error('Laundry Type not found');

            return redirect(route('admin.laundryTypes.index'));
        }

        return view('admin.laundry_types.show')->with('laundryType', $laundryType);
    }

    /**
     * Show the form for editing the specified LaundryType.
     */
    public function edit($id)
    {
        /** @var  LaundryType $laundryType */
        $laundryType = LaundryType::find($id);

        if (empty($laundryType)) {
            Flash::error('Laundry Type not found');

            return redirect(route('admin.laundryTypes.index'));
        }

        return view('admin.laundry_types.edit')->with('laundryType', $laundryType);
    }

    /**
     * Update the specified LaundryType in storage.
     */
    public function update($id, UpdateLaundryTypeRequest $request)
    {
        /** @var  LaundryType $laundryType */
        $laundryType = LaundryType::find($id);

        if (empty($laundryType)) {
            Flash::error('Laundry Type not found');

            return redirect(route('admin.laundryTypes.index'));
        }

        $laundryType->fill($request->all());
        $laundryType->save();

        Flash::success('Laundry Type updated successfully.');

        return redirect(route('admin.laundryTypes.index'));
    }

    /**
     * Remove the specified LaundryType from storage.
     *
     * @throws  \Exception
     */
    public function destroy($id)
    {
        /** @var  LaundryType $laundryType */
        $laundryType = LaundryType::find($id);

        if (empty($laundryType)) {
            Flash::error('Laundry Type not found');

            return redirect(route('admin.laundryTypes.index'));
        }

        $laundryType->delete();

        Flash::success('Laundry Type deleted successfully.');

        return redirect(route('admin.laundryTypes.index'));
    }
}
