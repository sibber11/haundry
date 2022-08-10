<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Flash;

class OrderController extends AppBaseController
{
    /**
     * Display a listing of the Order.
     */
    public function index(Request $request)
    {
        /** @var  Order $orders */
        $orders = Order::paginate(10);

        return view('admin.orders.index')
            ->with('orders', $orders);
    }


    /**
     * Show the form for creating a new Order.
     */
    public function create()
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created Order in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();

        /** @var  Order $order */
        $order = Order::create($input);

        Flash::success('Order saved successfully.');

        return redirect(route('admin.orders.index'));
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

        return redirect(route('admin.orders.index'));
    }
}
