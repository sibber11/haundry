<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('action', 'admin.orders.datatables_actions')
            ->editColumn('checkbox', function ($order) {
                return '<input type="checkbox" value="' . $order->id . '" form="assign-form" name="order_id[]" />';
            })->rawColumns(['checkbox', 'action'])
            ->editColumn('pickup', function ($order) {
                return $order->pickup->format('d-m-Y');
            })
            ->editColumn('deadline', function ($order) {
                return $order->deadline->format('d-m-Y');
            });
//            ->editColumn('due_date', function ($order) {
//                return $order->due_date?->format('d-m-Y');
//            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        request()->validate([
            'filter' => 'nullable|string|in:pickable,operable,deliverable,running,new'
        ]);
        $query = $model->newQuery()
            ->with('customer');

        $query
            ->when(request()->input('filter') == 'new', fn($q) => $q->new())
            ->when(request()->input('filter') == 'pickable', fn($q) => $q->pickable())
            ->when(request()->input('filter') == 'operable', fn($q) => $q->operable())
            ->when(request()->input('filter') == 'deliverable', fn($q) => $q->deliverable())
            ->when(request()->input('filter') == 'running', fn($q) => $q->running());

        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '70px', 'printable' => false])
            ->addCheckbox([], 0)
//            ->selectStyleMulti()
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')->searchable(false)->title('Order ID'),
            Column::make('customer.name')
                ->name('customer.name'),
            Column::make('status')->searchable(false),
            Column::make('pickup')->searchable(false),
            Column::make('deadline')->searchable(false),
//            Column::make('sub_total')->searchable(false),
            Column::make('total')->searchable(false),
//            Column::make('paid')
//                ->render("data?'paid':'no'")->searchable(false),
//            Column::make('due_date')->searchable(false),
//            Column::make('voucher_id')->searchable(false),
//            Column::make('point_used')->searchable(false),


        ];
    }

    public function confirmOrder()
    {
        return 'ok';
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'orders_datatable_' . time();
    }
}


