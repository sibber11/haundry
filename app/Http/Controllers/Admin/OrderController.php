<?php

namespace App\Http\Controllers\Admin;

use App\Helper\DeadlineSolver;
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
    public function index(Request $request)
    {
        $request->validate([
            'filter' => 'nullable|string|in:pickable,operable,deliverable,running'
        ]);
        /** @var  Order $orders */
        $orders = Order::when($request->input('filter') == 'pickable', fn($q) => $q->pickable())
            ->when($request->input('filter') == 'operable', fn($q) => $q->operable())
            ->when($request->input('filter') == 'deliverable', fn($q) => $q->deliverable())
            ->when($request->input('filter') == 'running', fn($q) => $q->running())
            ->orderBy('id', 'desc')
            ->paginate(10)->withQueryString();

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
     * Store a newly created Order in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $input = $request->all();
        /** @var  Order $order */
        $input['deadline'] = DeadlineSolver::solve($input);
        DB::beginTransaction();
        $order = Order::create($input);
        $order->add_items($input['items']);

        if ($request->has('voucher_code')) {
            if (!$order->apply_voucher($request->input('voucher_code'))) {
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

    public function update_status($id, Request $request)
    {
        $request->validate([
            'status' => 'required|string'
        ]);
        /** @var  Order $order */
        $order = Order::find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('admin.orders.index'));
        }

        $status = $request->input('status');
        $order->change_status($status);
        return redirect()->route('admin.orders.show', $order);
    }
}
