<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            //iposita_form
            ->addColumn('iposita_form', function ($user) {
                return $user->iposita_form ? '<a href="'.asset($user->getIpositaForm()).'" target="_blank">View</a>' : '-';
            })
            ->editColumn('photo', function ($item) {
                $image = $item->photo ? asset($item->getPhoto()) : asset('/metronic/theme/html/demo1/dist/assets/media/svg/avatars/016-boy-7.svg');
                return'<div class="symbol symbol-40 symbol-light-success mr-5">
														<span class="symbol-label">
															<img src="'.$image.'" class="h-100 align-self-end" alt="" data-lightbox="image" data-title="user">
														</span>
													</div>';
            })
            ->editColumn('roles', function ($item) {
                if(count($item->roles)>0){
                    $roles="";
                    foreach($item->roles as $role){
                        $roles .='<span class="badge badge-success" style="margin-bottom: 5px">'.$role->name.'</span>';
                    }
                    return $roles ;
                }else{
                    return "-";
                }

            })
            ->editColumn('branch_name', function ($item) {
                return $item->branch->name??"-";
            })
            ->editColumn('gender', function ($item) {
                return '<span class="text-'.($item->gender == "Male"? "primary":"info").'">'.$item->gender.'</span>';
            })
            ->editColumn('national_id', function ($item) {
                $download = $item->nid_attachment ? "<a href='".asset($item->getNationalIdAttachments())."' target='_blank' class='btn btn-sm btn-info'><i class='fa fa-download'></i></a>":"-";
                return $item->national_id." <br> ".$download;
            })
            ->editColumn('status', function ($item) {
                if($item->is_active){
                    return '
                <a href="'.route('admin.users.flow.history', encryptId($item->id)).'" data-toggle="tooltip" data-placement="top" title="Click for more">
                    <span class="badge badge-success">Active</span>
                </a>';
                }else{
                    return '
                 <a href="'.route('admin.users.flow.history', encryptId($item->id)).'" data-toggle="tooltip" data-placement="top" title="Click for more">
                 <span class="badge badge-danger">Inactive</span>
                 </a>';
                }
            })
            ->addColumn('action', function ($item) {
                $userActivation = $item->is_active ? "Deactivate":"Activate";
              $reset_password =   !auth()->user()->can('Reset Password') ? "" :
                    ' <a class=" reset-btn dropdown-item"
                                               href="'.route("admin.users.reset.password",encryptId($item->id)).'">
                                                Reset password
                                            </a>';
                return '<div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Actions
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="'.route("admin.user.add.roles",$item->id).'">Manage Roles</a>
                                    <a class="dropdown-item disable-user-btn"
                                       data-toggle="modal"
                                       data-target="#disable-user-modal"
                                     href="'.route("admin.users.disable",encryptId($item->id)).'">'.$userActivation.' User</a>

                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="edit-btn dropdown-item "
                                       data-toggle="modal"
                                       data-target="#edit-user-model"
                                       data-name="'.$item->name.'"
                                       data-email="'.$item->email.'"
                                       data-telephone="'.$item->telephone.'"
                                       data-gender="'.$item->gender.'"
                                       data-id="'.$item->id.'"
                                       data-branch="'.$item->branch_id.'"
                                       data-national_id="'.$item->national_id.'"
                                       data-is_active="'.$item->is_active.'"


                                       data-url="'.route("admin.users.update",$item->id).'"> Edit</a>'
                                        . $reset_password .
                                '</div>
                            </div>';
            })
            ->rawColumns(['action','roles','status','national_id','photo','gender','iposita_form']);
    }


    /**
     * Get query source of dataTable.
     *
     * @param user $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
//            ->orderBy(1,"asc")
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
            Column::make('photo')->title('Photo'),
            Column::make('name'),
            Column::make('email')
                ->addClass('text-center'),
            Column::make('telephone')
                ->addClass('text-center'),
            Column::make('gender')
                ->addClass('text-center'),
            Column::make('branch_name')
                ->title("Branch")
                ->name("branch.name")
                ->addClass('text-center'),
            Column::make('national_id')
                ->name('national_id')
                ->addClass('text-center'),
            Column::make('status')
                ->name('is_active')
                ->title("Status")
                ->addClass('text-center'),
            Column::make('roles')
                ->title("Roles")
                ->name("roles.name")
                ->addClass('text-center'),
             Column::make('iposita_form')
                ->title("Iposita Form")
                ->name("iposita_form")
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
