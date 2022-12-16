<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateBannerRequest;
use App\Models\Banner;
use Flash;
use Illuminate\Http\Request;

class BannerController extends AppBaseController
{
    /**
     * Display a listing of the Banner.
     */
    public function index(Request $request)
    {
        /** @var Banner $banners */
        $banners = Banner::paginate(10);

        return view('admin.banners.index')
            ->with('banners', $banners);
    }

    /**
     * Store a newly created Banner in storage.
     */
    public function store(CreateBannerRequest $request)
    {
        $input = $request->all();
//        dd($request->file('image')->store('banners'));
        $input['image'] = $request->file('image')->store('banners');

        /** @var Banner $banner */
        $banner = Banner::create($input);

        Flash::success('Banner saved successfully.');

        return redirect(route('admin.banners.index'));
    }

    /**
     * Show the form for creating a new Banner.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    public function update($id, Request $request)
    {

        /** @var Banner $banner */
        $banner = Banner::find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');
            return redirect(route('admin.banners.index'));
        }
        if ($request->has('hide')) {
            $banner->show = false;
            $banner->save();
            Flash::success('Banner hidden successfully.');

            return redirect(route('admin.banners.index'));
        }
        if ($request->has('show')) {
            $banner->show = true;
            $banner->save();
            Flash::success('Banner Shown successfully.');
            return redirect(route('admin.banners.index'));
        }

        Flash::error('Invalid Action!');
        return redirect(route('admin.banners.index'));
    }

    /**
     * Remove the specified Banner from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Banner $banner */
        $banner = Banner::find($id);

        if (empty($banner)) {
            Flash::error('Banner not found');

            return redirect(route('admin.banners.index'));
        }
        \Storage::delete($banner->image);
        $banner->delete();

        Flash::success('Banner deleted successfully.');

        return redirect(route('admin.banners.index'));
    }
}
