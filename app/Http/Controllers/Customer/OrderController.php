<?php

namespace App\Http\Controllers\Customer;

use App\Events\OrderPlaced;
use App\Helper\DateSolver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class OrderController extends Controller
{
    public function index()
    {
        return view('customer.orders.index');
    }

    public function create()
    {
        return view('customer.orders.create');
    }

    public function store(CreateOrderRequest $request)
    {
        $input = $request->validated();
        $input['deadline'] = DateSolver::solve($input, 'deadline');
        $input['pickup'] = DateSolver::solve($input, 'pickup');
        $order = Order::make($input);
        DB::beginTransaction();
        auth()->user()->orders()->save($order);
        $order->add_items($input['items']);
        if ($request->has('use_point')) {
            $order->use_point();
        }
        if ($request->has('voucher_code') && $request->input('voucher_code') != '') {
            if ($order->apply_voucher($request->input('voucher_code'))) {
                DB::commit();
            } else {
                DB::rollBack();
                Flash::success('Invalid voucher!');
                return redirect()->route('orders.create')->withInput();
            }
        } else {
            DB::commit();
        }
        OrderPlaced::dispatch($order);
        Flash::success($order->toJson());
        Flash::success('Order saved successfully.');
        return redirect()->route('orders.index')->with('status', "Your Order has been Placed.");
    }

    public function cancel()
    {
        return 'canceled';
    }
}
