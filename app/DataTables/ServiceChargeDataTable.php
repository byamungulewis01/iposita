<?php

namespace App\DataTables;

use App\Models\Branch;
use App\Models\ServiceCharges;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceChargeDataTable extends DataTable
{

    public $query;
    public function __construct($query)
    {
        $this->query = $query;
    }
    /**
     * Build DataTables class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables($query)
            ->editColumn('service_provider_id',function ($item){
                return $item->serviceProvider->name;
            })
            ->editColumn('service_id',function ($item){
                return $item->service->name;
            })
            ->editColumn('charges_type', function ($item) {
                switch ($item->charges_type) {
                    case 'Flat':
                        return '<span class="badge badge-warning">Flat</span>';
                        break;
                    case 'Percentage':
                        return '<span class="badge badge-success">Percentage</span>';
                        break;
                    case 'Range':
                        return '<span class="badge badge-info">Range</span>';
                        break;
                    default:
                        return '-';
                        break;
                }

            })
            ->editColumn('charge_customer', function ($item) {
                return $item->charge_customer == 1 ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>';
            })
            ->addColumn('action', function ($item) {
                return '<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a href="#" class="edit-btn dropdown-item "
                                       data-toggle="modal"
                                       data-target="#charge-update"
                                       data-service_provider="'.$item->service_provider_id.'"
                                       data-service="'.$item->service_id.'"
                                       data-charges_type="'.$item->charges_type.'"
                                       data-id="'.$item->id.'"
                                       data-min="'.$item->min.'"
                                       data-max="'.$item->max.'"
                                       data-charges="'.$item->charges.'"
                                       data-customer_charge="'.$item->charge_customer.'"
                                       data-url="'.route("admin.charges.update",$item->id).'"> Edit</a>'

                    . '<a  href="'.route('admin.charges.delete',$item->id).'" class="dropdown-item delete-button"> Delete</a>'.
                    '</div>
                            </div>';
            })
            ->rawColumns(['action','permissions','charges_type','charge_customer']);
    }


    /**
     * Get query source of dataTable.
     *
     * @param user $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceCharges $model)
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
            ->setTableId('datadatatable-table')
            ->addTableClass('table table-striped- table-hover table-checkable')
            ->columns($this->getColumns())
            ->minifiedAjax()
//            ->dom('Bfrtip')
            ->orderBy(1,"asc")
            ->parameters([
//                'dom'        => 'Bfrtip',
//                'responsive' => true,
//                "lengthMenu" => [
//                    [10, 25, 50, -1],
//                    ['10 rows', '25 rows', '50 rows', 'Show all']
//                ],
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
            'id' => ['title' => '#', 'searchable' => false, 'render' => function() {
                return 'function(data,type,fullData,meta){return meta.settings._iDisplayStart+meta.row+1;}';
            }],
            Column::make('service_provider_id')
            ->addClass('text-center')
            ->title('Service Provider'),
            Column::make('service_id')
                ->addClass('text-center')
                ->title('Service'),
            Column::make('charges_type')
                ->title('Charge Type')
                ->addClass('text-center'),
            Column::make('min')
                ->title('Min')
                ->addClass('text-center'),
            Column::make('max')
                ->title('Max')
                ->addClass('text-center'),
            Column::make('charges')
                ->title('Charges')
                ->addClass('text-center'),
            Column::make('charge_customer')
                ->title('Charge Customer')
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

}
