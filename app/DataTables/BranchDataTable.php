<?php

namespace App\DataTables;

use App\FileManager;
use App\Models\Branch;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BranchDataTable extends DataTable
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
            ->editColumn('province_id',function ($item){
                return $item->province->name;
            })
            ->editColumn('district_id',function ($item){
                return $item->district->name;
            })
            ->editColumn('sector_id',function ($item){
                return $item->sector->name;
            })
            ->editColumn('branch_type', function ($item) {
                    return '<span class="badge badge-'.($item->branch_type =="Internal" ? "success":"info").'">'.($item->branch_type ?? 'Internal').'</span>';
                })
            ->editColumn('contract', function ($item) {
                if ($item->contract) {
                    return '<a href="'.$item->contract.'" target="_blank"><i class="fa fa-download"></i></a>';
                }else{
                    return '<span class="badge badge-danger">No Contract</span>';
                }
            })

            ->editColumn('status', function ($item) {
                if($item->status== "Active"){
                    return '<span class="badge badge-success">Active</span>';
                }else{
                    return '<span class="badge badge-danger">Inactive</span>';
                }


            })->addColumn('action', function ($item) {
                $isExternal = $item->branch_type == 'External' ?
                   '<a href="#" data-url="'.route("admin.charges.set-external-branch-percentage", ['branch_id'=>encryptId($item->id)]).'"
                                       data-id="'.$item->id.'"
                                       data-percentage="'.$item->percentage.'"
                                       data-toggle="modal" data-target="#branchPercentageModal" class="dropdown-item btn-set-percentage"> Set Branch %</a>

                   <a href="'.route("admin.branches.top-ups.index", ['branch'=>encryptId($item->id)]).'"
                                        class="dropdown-item"> Topup Branch</a>
                    '
                    : '';
                return '<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                <a href="'.route('admin.branches.users',$item->id).'" class="dropdown-item "> Users</a>
                                <a href="'.route('admin.branches.services',encryptId($item->id)).'" class="dropdown-item "> Services</a>

                                    '.$isExternal.'
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="edit-btn dropdown-item "
                                       data-toggle="modal"
                                       data-target="#branch-update"
                                       data-name="'.$item->name.'"
                                       data-email="'.$item->email.'"
                                       data-province_id="'.$item->province_id.'"
                                       data-district_id="'.$item->district_id.'"
                                       data-sector_id="'.$item->sector_id.'"
                                       data-telephone="'.$item->telephone.'"
                                       data-id="'.$item->id.'"
                                       data-is_active="'.$item->status.'"
                                       data-url="'.route("admin.branches.update",$item->id).'"> Edit</a>'
                     . '<a href="'.route('admin.branches.delete',$item->id).'" class="dropdown-item delete-button"> Delete</a>'.
                    '</div>
                            </div>';
            })
            ->rawColumns(['action','permissions','status','branch_type','contract']);
    }
    /**
     * Get query source of dataTable.
     *
     * @param user $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Branch $model)
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
            ->orderBy(10,"desc")
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
            Column::make('name'),
            Column::make('email')
                ->addClass('text-center'),
            Column::make('telephone')
                ->addClass('text-center'),
            Column::make('branch_type')
            ->name('Branch Type')
            ->title('Branch Type'),
            Column::make('contract')
                ->addClass('text-center'),
            Column::make('status')
                ->name('status')
                ->title("Status")
                ->addClass('text-center'),
            Column::make('province_id')
                ->title("Province")
                ->name("province.name")
                ->addClass('text-center'),
            Column::make('district_id')
                ->title("District")
                ->name("district.name")
                ->addClass('text-center'),
            Column::make('sector_id')
                ->title("Sector")
                ->name("sector.name")
                ->addClass('text-center'),
            Column::make('created_at')
                ->title("Created At")
                ->visible(false)
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
