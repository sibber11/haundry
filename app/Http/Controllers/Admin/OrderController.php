<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Helper\DateSolver;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class OrderController extends AppBaseController
{
    /**
     * Display a listing of the Order.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('admin.orders.index');
    }

    /**
     * Store a newly created Order in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->validated();
        /** @var  Order $order */
        $input['deadline'] = DateSolver::solve($input, 'deadline');
        $input['pickup'] = DateSolver::solve($input, 'pickup');
        DB::beginTransaction();
        $order = Order::create($input);
        if (!$order->addItems($input['items'])) {
            DB::rollBack();
            Flash::success('Invalid items!');
            return redirect()->route('admin.orders.create')->withInput();
        }

        if ($request->has('voucher_code') && $request->input('voucher_code') != '') {
            if (!$order->applyVoucher($request->input('voucher_code'))) {
                DB::rollBack();
                Flash::success('Invalid voucher!');
                return redirect()->route('admin.orders.create')->withInput();
            }
        } else {
            DB::commit();
        }


        Flash::success('Order saved successfully.');

        return redirect(route('admin.orders.index'));
    }

    /**
     * Show the form for creating a new Order.
     */
    public function create(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $request->validate([
                'q' => 'nullable|string',
                'type' => 'required|string'
            ]);
            if (!$request->input('q')) {
                return ['data' => []];
            }
            $q = $request->input('q');
            if ($request->input('type') == 'customer') {
                $customer_list = Customer::where('name', 'like', "$q%")->limit(5)->get();
                return CustomerResource::collection($customer_list);
            }
            return 'Error!';
        }
        return view('admin.orders.create');
    }

    /**
     * Display the specified Order.
     */
    public function show($id)
    {
        /** @var  Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.orders.index'));
        }

        return view('admin.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     */
    public function edit($id)
    {
        /** @var  Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.orders.index'));
        }

        return view('admin.orders.edit')->with('order', $order);
    }

    /**
     * Update the specified Order in storage.
     */
    public function update($id, UpdateOrderRequest $request)
    {
        /** @var  Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.orders.index'));
        }

        $order->fill($request->all());
        $order->save();

        Flash::success('Order updated successfully.');

        return redirect(route('admin.orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @throws  \Exception
     */
    public function destroy($id)
    {
        /** @var  Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.orders.index'));
        }

        $order->delete();

        Flash::success('Order deleted successfully.');

        return back();
//        return redirect(route('admin.orders.index'));
    }

    public function update_status(Request $request)
    {
        $input = $request->validate([
            'status' => 'required|string|in:operated,confirmed',
            'order_id' => 'required|array'
        ]);

        $orders = Order::findMany($input['order_id']);

        if ($orders->isEmpty()) {
            Flash::error('Orders not found');

            return back();
        }

        $orders->each(function ($order) use ($input) {
            $order->change_status($input['status']);
        });

        Flash::success('Orders marked as operated');
        return back();
    }
}
