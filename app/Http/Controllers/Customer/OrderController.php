<?php

namespace App\Http\Controllers\Customer;

use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class OrderController extends Controller
{
    public function index()
    {
        return view('customer.orders.index');
    }

    public function show(Order $order)
    {
        $order->load('laundries');
        $order->laundries->append('price');
        return view('customer.orders.show', compact('order'));
    }

    public function create()
    {
        return view('customer.orders.create');
    }

    public function store(Request $request)
    {
        $input['items'] = $request->session()->get('cart');
        $input['deadline'] = Carbon::now()->addDays(3);
        $input['pickup'] = Carbon::today()->setTime(17, 0);
        $order = Order::make($input);
        DB::beginTransaction();
        auth()->user()->orders()->save($order);
        if (!$order->addItems($input['items'])) {
            DB::rollBack();
            Flash::error('Invalid items!');
            return redirect()->route('orders.create')->withInput();
        };
        if ($request->has('use_point')) {
            $order->usePoint();
        }
        if ($request->has('voucher_code') && $request->input('voucher_code') != '') {
            if ($order->applyVoucher($request->input('voucher_code'))) {
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

    public function cancel(): string
    {
        return 'canceled';
    }

    public function save_cart(Request $request)
    {
        if ($request->input('cart') == []) {
            return response()->json(['status' => 'error', 'message' => 'Cart is empty']);
        }

        $request->session()->put('cart', $request->input('cart'));
        return response()->json(['status' => 'success', 'redirect' => route('review_order'), 'message' => 'Cart saved successfully']);
    }

    public function review_order(Request $request)
    {
        return view('customer.orders.review_order', ['cart' => $request->session()->get('cart')]);
    }
}
