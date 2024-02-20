<?php

namespace App\DataTables;

use App\Constants\StatusColor;
use App\Models\IpositaTopup;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IpositaTopupDataTable extends DataTable
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
            ->addColumn('service', function ($topup) {
                return optional($topup->service)->name ?? "-";
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
                return '<span class="badge badge-'. StatusColor::getStatusColor(strtoupper($topup->status)).'">'.strtoupper($topup->status) . '</span>';
            })
            ->editColumn('attachment', function ($topup) {
                if ($topup->attachment) {
                    return '<a href="' . $topup->getAttachment(). '" target="_blank"><i class="fa fa-download fa-2x text-dark"></i></a>';
                } else {
                    return '-';
                }
            })
            ->addColumn('action', function ($item) {
                $submitBtn = '';
                $deleteBtn = '';
                $editBtn = '';
                $reviewBtn = '';

                if ($item->status == 'pending') {
                    $submitBtn = '<a href="'.route('admin.iposita-top-ups.submit',$item->id).'" class="dropdown-item confirm-button"> Submit</a>';
                    $deleteBtn = '<a href="'.route('admin.iposita-topups.destroy',$item->id).'" class="dropdown-item delete-button"> Delete</a>';
                    $editBtn = '<a href="#" class="edit-btn dropdown-item "
                                                   data-toggle="modal"
                                                   data-target="#updateToupModal"
                                                   data-service_provider="'.$item->service_provider_id.'"
                                                   data-service="'.$item->service_id.'"
                                                   data-description="'.$item->description.'"
                                                   data-amount="'.$item->topup_amount.'"
                                                   data-id="'.$item->id.'"
                                                   data-is_active="'.$item->status.'"
                                                   data-url="'.route("admin.iposita-topups.update",$item->id).'"> Edit</a>';
                }
                if (auth()->user()->can('Review Wallet Top-ups') && $item->status == 'SUBMITTED') {
                    $reviewBtn = '<a href="'.route('admin.confirm-iposita-top-ups',$item->id).'" class="dropdown-item btn-approve"data-toggle="modal" data-target="messageModal"> Review</a>';
                }

                $isConfirmed = $item->status == 'CONFIRMED';
                $isReversed = $item->status == 'REVERSED';
                $result = $isConfirmed
                    ?
                    '-'
                    :
                    ($isReversed ? "" :'<div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">Actions
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                '.$submitBtn.'
                                                '.$editBtn.'
                                                '.$deleteBtn.'
                                                '.$reviewBtn.'
                                            </div>
                                        </div>');
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
    public function query(IpositaTopup $model)
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
            ->setTableId('ipositatopups-table')
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
        return 'IpositaTopups_' . date('YmdHis');
    }
}
