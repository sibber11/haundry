<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Models\Package;
use Flash;
use Illuminate\Http\Request;

class PackageController extends AppBaseController
{
    /**
     * Display a listing of the Package.
     */
    public function index(Request $request)
    {
        /** @var Package $packages */
        $packages = Package::paginate(10);

        return view('admin.packages.index')
            ->with('packages', $packages);
    }

    /**
     * Store a newly created Package in storage.
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();

        /** @var Package $package */
        $package = Package::create($input);

        Flash::success('Package saved successfully.');

        return redirect(route('admin.packages.index'));
    }

    /**
     * Show the form for creating a new Package.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Display the specified Package.
     */
    public function show($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('admin.packages.index'));
        }

        return view('admin.packages.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     */
    public function edit($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('admin.packages.index'));
        }

        return view('admin.packages.edit')->with('package', $package);
    }

    /**
     * Update the specified Package in storage.
     */
    public function update($id, UpdatePackageRequest $request)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('admin.packages.index'));
        }

        $package->fill($request->all());
        $package->save();

        Flash::success('Package updated successfully.');

        return redirect(route('admin.packages.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Package $package */
        $package = Package::find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('admin.packages.index'));
        }

        $package->delete();

        Flash::success('Package deleted successfully.');

        return redirect(route('admin.packages.index'));
    }
}
