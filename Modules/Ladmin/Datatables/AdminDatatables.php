<?php

namespace Modules\Ladmin\Datatables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDatatables extends DataTable
{
     /**
     * Build DataTable class.
     *
     * @param  mixed $query Results from query() method.
     * @return  \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->rawColumns(['avatar'])
            ->addColumn('avatar', function ($row) {
                return "<img src=\"{$row->gravatar}\" class=\"rounded-circle img-thumbnail\" width=\"45\" alt=\"Avatar\">";
            })
            ->editColumn('roles.name', function ($row) {
                return $row->roles->pluck('name');
            })
            ->addColumn('action', function ($row) {
                return $this->action($row);
            });
    }

    public function action($data)
    {
        return ladmin()->view('admin._parts.table-action', $data);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\User $model
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return ladmin()->admin()->with('roles');
    }

     /**
     * Optional method if you want to use html builder.
     *
     * @return  \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"top"<"left-col"f><"center-col"><"right-col">>rtip')
                    ->orderBy(2)
                    ->processing(true)
                    ->initComplete('function() { $("#overlay").hide(); }');
                    // ->buttons([
                    //     Button::raw('<i class="fas fa-plus"></i> Add Role')
                    //         ->className('btn btn-primary')
                    //         ->init($this->initButton()), //add remove  button
                    // ]);
    }

     /**
     * create button Attribute that can call modal build in
     *
     * see controller at \Modules\Ladmin\Http\Controllers\RoleController;
     * @return array
     */
    public function createButton()
    {
        return [
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#modal-create-role'
        ];
    }

    /**
     * Button add javascript into init
     *
     * @return string
     */
    public function initButton()
    {
        return "$(node).removeClass('btn-secondary')";
    }

    /**
     * Button create page
     *
     * @return \Illuminate\Support\Facades\Blade
     */
    public function button()
    {
        return ladmin()->view('role.create');
    }


    /**
     * Get columns.
     *
     * @return  array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title(__('No'))->searchable(false),
            Column::make('avatar')
                ->title('Avatar')
                ->addClass('text-center')
                ->orderable(false),
            Column::make('first_name')
                ->title('Name')
                ->addClass('text-start align-middle'),
            Column::make('email')
                ->title('Email')
                ->addClass('text-start align-middle'),
            Column::make('roles.name')
                    ->title('Roles')
                    ->addClass('text-start align-middle')
                    ->orderable(false),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-end')
                  ->searchable(false)
                  ->orderable(false),
        ];
    }

     /**
     * Get filename for export.
     *
     * @return  string
     */
    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
