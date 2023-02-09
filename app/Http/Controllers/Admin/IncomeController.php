<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'year' => 'nullable|numeric',
            'month' => 'nullable|numeric'
        ]);
        $res = \DB::table('orders')->selectRaw('count(id) as number_of_orders, sum(total) as total,day(updated_at) as day, month(updated_at) as month, year(updated_at) as year')
            ->when($request->has('year'), function (Builder $builder) use ($request) {
                $builder->whereRaw('year(updated_at) =' . $request->input('year', [], 'and'));
            }, function (Builder $builder) {
                $builder->whereRaw('year(updated_at) =' . now()->year);
            })
            ->when($request->has('month') && $request->input('month') != '', function (Builder $builder) use ($request) {
                $builder->whereRaw('month(updated_at) =' . $request->input('month'));
            })
            ->groupBy('year', 'month', 'day')
            ->get();
        $incomes = $res->groupBy('month')->map(function ($item, $key) {
            $item->total = $item->sum('total');
            $item->number_of_orders = $item->sum('number_of_orders');
            $item->month = Carbon::createFromFormat('m', $key)->format('F');
            return $item;
        });

//        dd($incomes);
        return view('admin.income.index')->with('incomes', $incomes);
    }
}
