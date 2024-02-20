<?php

namespace App\DataTables;

use App\Models\ServiceBalance;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IpositaBalanceDataTable extends DataTable

{
    public $query;
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('service_provider', function ($topup) {
                return optional($topup->serviceProvider)->name ?? "-";
            })
            ->addColumn('service', function ($topup) {
                return optional($topup->service)->name ?? "-";
            })
            ->addColumn('balance', function ($topup) {
                return number_format($topup->balance, 0,'.',',') ?? "-";
            })
            ->rawColumns(['service_provider','service','balance']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BranchTopup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceBalance $model)
    {
        return $this->query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('ipositabalance-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('frtip')
            ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => ['title' => '#', 'searchable' => false, 'render' => function() {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            Column::make('service_provider'),
            Column::make('service'),
            Column::make('balance')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'IpositaBalance_' . date('YmdHis');
    }
}
