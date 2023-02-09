<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\Voucher;
use Flash;
use Illuminate\Http\Request;

class VoucherController extends AppBaseController
{
    /**
     * Display a listing of the Voucher.
     */
    public function index(Request $request)
    {
        /** @var Voucher $vouchers */
        $vouchers = Voucher::paginate(10);

        return view('admin.vouchers.index')
            ->with('vouchers', $vouchers);
    }

    /**
     * Store a newly created Voucher in storage.
     */
    public function store(CreateVoucherRequest $request)
    {
        $input = $request->all();

        /** @var Voucher $voucher */
        $voucher = Voucher::create($input);

        Flash::success('Voucher saved successfully.');

        return redirect(route('admin.vouchers.index'));
    }

    /**
     * Show the form for creating a new Voucher.
     */
    public function create()
    {
        return view('admin.vouchers.create');
    }

    /**
     * Show the form for editing the specified Voucher.
     */
    public function edit($id)
    {
        /** @var Voucher $voucher */
        $voucher = Voucher::find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('admin.vouchers.index'));
        }

        return view('admin.vouchers.edit')->with('voucher', $voucher);
    }

    /**
     * Update the specified Voucher in storage.
     */
    public function update($id, UpdateVoucherRequest $request)
    {
        /** @var Voucher $voucher */
        $voucher = Voucher::find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('admin.vouchers.index'));
        }

        $voucher->fill($request->all());
        $voucher->save();

        Flash::success('Voucher updated successfully.');

        return redirect(route('admin.vouchers.index'));
    }

    /**
     * Remove the specified Voucher from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Voucher $voucher */
        $voucher = Voucher::find($id);

        if (empty($voucher)) {
            Flash::error('Voucher not found');

            return redirect(route('admin.vouchers.index'));
        }

        $voucher->delete();

        Flash::success('Voucher deleted successfully.');

        return redirect(route('admin.vouchers.index'));
    }
}
