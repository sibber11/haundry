<?php

namespace App\Http\Controllers\Customer;

use App\Helper\DeadlineSolver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class OrderController extends Controller
{
    public function index()
    {
        return view('customer.order.index');
    }

    public function create()
    {
        return view('customer.order.create');
    }

    public function store(CreateOrderRequest $request)
    {
//        dd('bu');
        $input = $request->validated();
        $input['deadline'] = DeadlineSolver::solve($input);
        $order = Order::make($input);
        DB::beginTransaction();
        auth()->user()->orders()->save($order);
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
        return redirect('/')->with('status', "Your Order has been Placed.");
    }

    public function cancel()
    {
        return 'canceled';
    }
}
