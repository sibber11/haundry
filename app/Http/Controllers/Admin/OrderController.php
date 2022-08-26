<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Customer;
use Laracasts\Flash\Flash;
use App\Models\LaundryType;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateOrderRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use Illuminate\Support\Carbon;

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
    public function create(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $request->validate([
                'q' => 'nullable|string',
            ]);
            if ($request->has('q')) {
                # code...
            }
            if ($request->has('customer')) {
                return ['results' => Customer::all()];
            }elseif($request->has('type')){
                return ['results' => LaundryType::all()];
            }
            return 'Error!';
        }
        return view('admin.orders.create');
    }

    /**
     * Store a newly created Order in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        /** @var  Order $order */
        $input['deadline'] = Carbon::make($input['deadline_date'].$input['deadline_time']);
        $order = Order::create($input);
        $order->add_items($input['items']);

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
