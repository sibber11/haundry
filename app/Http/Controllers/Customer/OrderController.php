<?php

namespace App\Http\Controllers\Customer;

use App\Helper\DeadlineSolver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

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
        auth()->user()->orders()->save($order);
        return redirect('/')->with('status', "Your Order has been Placed.");
    }

    public function cancel()
    {
        return 'canceled';
    }
}
