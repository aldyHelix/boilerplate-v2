<?php

namespace Modules\Ladmin\Datatables;

use Modules\Ladmin\Models\LadminRole;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
/**
 * Authors : @aldyHelix
 * use gitLens for future somewones updates
 */

class RoleDatatables extends Datatable
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
            ->editColumn('gates', function ($row) {
                return count($row->gates) . ' access';
            })
            ->addColumn('admins', function ($row) {
                return $row->admins->count() . ' admin';
            })
            ->addColumn('assign', function ($row) {
                return ladmin()->view('role._parts.table-assign', ['role' => $row]);
            })
            ->addColumn('action', function ($row) {
                return ladmin()->view('role._parts.table-action', ['role' => $row]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\User $model
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public function query(LadminRole $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return  \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('roles-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"top"<"left-col"f><"center-col"><"right-col"B>>rtip')
                    ->orderBy(1)
                    ->buttons([
                        Button::raw('<i class="fas fa-plus"></i> Add Role')
                            ->className('btn btn-primary')
                            ->init($this->initButton()) //add remove  button
                            ->attr($this->createButton()), //add attribute
                    ])
                    ->initComplete('function() { $("#overlay").hide(); }')
                    ->headerCallback("function() { $('#roles-table thead tr').addClass('fw-semibold fs-6 text-gray-800') }");
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
            Column::make('name')->title('Role Name')->addClass('text-start'),
            Column::make('admins')
                ->title('Used')
                ->addClass('text-center')
                ->searchable(false),
            Column::make('gates')
                ->title('Permission')
                ->addClass('text-center')
                ->searchable(false),
            Column::make('assign')
                    ->title('Assign Permission')
                    ->addClass('text-center')
                    ->width(200)
                    ->exportable(false)
                    ->printable(false)
                    ->searchable(false),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-end')
                  ->searchable(false),
        ];
    }

     /**
     * Get filename for export.
     *
     * @return  string
     */
    protected function filename()
    {
        return 'Roles_' . date('YmdHis');
    }
}
