<?php

namespace App\DataTables;

use App\Constants\StatusColor;
use App\Models\BranchTopup;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BranchTopupsDataTable extends DataTable
{

    public $query;
    public function __construct($query,$is_report=false)
    {
        $this->query=$query;
        $this->is_report=$is_report;
    }
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($topup) {
                return $topup->created_at->format('d-m-Y');
            })
            ->addColumn('service_provider', function ($topup) {
                return optional($topup->serviceProvider)->name ?? "-";
            })
            ->addColumn('branch', function ($topup) {
                return optional($topup->branch)->name ?? "-";
            })
            ->addColumn('service', function ($topup) {
                return ($topup->service)->name ?? "-";
            })
            ->editColumn('previous_amount', function ($topup) {
                return number_format($topup->previous_amount) ?? 0;
            })
            ->editColumn('topup_amount', function ($topup) {
                return number_format($topup->topup_amount) ?? 0;
            })
            ->editColumn('amount', function ($topup) {
                            return number_format($topup->previous_amount + $topup->topup_amount);
                        })
            ->editColumn('status', function ($topup){
                return '<span class="badge badge-'. (StatusColor::getStatusColor($topup->status)).'">'.strtoupper($topup->status) . '</span>';
            })
            ->editColumn('attachment', function ($topup) {
                if ($topup->attachment) {
                    return '<a href="' . $topup->getAttachment(). '" target="_blank"><i class="fa fa-download fa-2x text-dark"></i></a>';
                } else {
                    return '-';
                }
            })
            ->addColumn('action', function ($item) {
                $isConfirmed = $item->status == 'CONFIRMED';
                $isReversed = $item->status == 'REVERSED';
                $result = $isConfirmed
                    ?
                    '<a href="'.route('admin.reverse-branch-top-ups',$item->id).'"data-toggle="modal"
                                                   data-target="#revertModal" class="btn btn-outline-danger revert-btn"> Revert</a>'
                    :
                    ($isReversed ? "" :'<div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">Actions
                                            </button>
                                            <div class="dropdown-menu" style="">
                                             <a href="'.route('admin.confirm-branch-top-ups',$item->id).'" class="dropdown-item confirm-button"> Confirm</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="edit-btn dropdown-item "
                                                   data-toggle="modal"
                                                   data-target="#updateToupModal"
                                                   data-service_provider="'.$item->service_provider_id.'"
                                                   data-service="'.$item->service_id.'"
                                                   data-description="'.$item->description.'"
                                                   data-amount="'.$item->topup_amount.'"
                                                   data-id="'.$item->id.'"
                                                   data-is_active="'.$item->status.'"
                                                   data-url="'.route("admin.branches.top-ups.update",['branch'=>encryptId($item->branch->id),'top_up'=>$item->id]).'"> Edit</a>'

                        . '<a href="'.route('admin.branches.top-ups.destroy',['branch'=>encryptId($item->branch->id),'top_up'=>$item->id]).'" class="dropdown-item delete-button"> Delete</a>'.
                        '</div>
                                        </div>' );

                return $result;
})
            ->rawColumns(['action', 'attachment','status','service_provider','service']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BranchTopup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BranchTopup $model)
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
                    ->setTableId('branchtopups-table')
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
            (isNotBranch() && $this->is_report)?
                Column::make('branch'):
                Column::computed('id')
                    ->visible(false),
            Column::make('service_provider'),
            Column::make('service'),
            Column::make('previous_amount'),
            Column::make('topup_amount')
                ->addClass('text-center'),
            Column::make('current_amount')
                ->addClass('text-center'),
            isNotBranch()?
            Column::make('description'):
                Column::computed('id')
                    ->visible(false),
            Column::make('status')
                ->name('status')
                ->title("Status")
                ->addClass('text-center'),
            isNotBranch()?
            Column::make('attachment')
                ->addClass('text-center'):
                Column::computed('id')
                    ->visible(false),
            Column::make('created_at')
                ->addClass('text-center'),
            (isNotBranch() && !$this->is_report)?
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-center'):
            Column::computed('id')
            ->visible(false)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BranchTopups_' . date('YmdHis');
    }
}
