<?php

namespace Modules\Ladmin\Datatables;

use Illuminate\Support\Facades\Blade;
use Hexters\Ladmin\Models\LadminLoggable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserActivityDatatables extends DataTable
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
            ->rawColumns(['admin.name', 'type', 'loggable_type', 'created_at', 'action'])
            ->editColumn('admin.name', function ($row) {
                return ladmin()->view('activities._parts._admin', ['data' => $row->admin])->render();
            })
            ->editColumn('type', function ($row) {
                return $row->type_badge;
            })
            ->editColumn('loggable_type', function ($row) {
                return Blade::render('<code>' . $row->loggable_type . '</code>');
            })
            ->editColumn('created_at', function ($row) {
                $date = $row->created_at->format(config('ladmin.date.format'));
                $diff = $row->created_at->diffForHumans();
                return Blade::render('<span>' . $date . '</span><br><small class="text-muted">' . $diff . '</small>');
            })
            ->addColumn('action', function ($row) {
                return ladmin()->view('activities._parts.table-action', ['data' => $row])->render();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param  \App\User $model
     * @return  \Illuminate\Database\Eloquent\Builder
     */
    public function query(LadminLoggable $model)
    {
        return $model->with('admin')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return  \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('user-activity-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"top"<"left-col"f><"center-col"><"right-col"B>>rtip')
                    ->orderBy(1)
                    ->buttons([
                        Button::raw('<i class="fas fa-trash"></i> Delete')
                            ->className('btn btn-danger')
                            ->init($this->initButton()) //add remove  button
                            ->attr($this->deleteButton()), //add attribute
                    ])
                    ->initComplete('function() { $("#overlay").hide(); }')
                    ->headerCallback("function() { $('#user-activity-table thead tr').addClass('fw-semibold fs-6 text-gray-800') }");
    }

    /**
     * create button Attribute that can call modal build in
     *
     * see controller at \Modules\Ladmin\Http\Controllers\RoleController;
     * @return array
     */
    public function deleteButton()
    {
        return [
            'data-bs-toggle' => 'modal',
            'data-bs-target' => '#delete-activity',
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
     * Get columns.
     *
     * @return  array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title(__('No'))->searchable(false),
            Column::make('created_at')->title('Date')->addClass('text-start'),
            Column::make('type')
                ->title('Method'),
            Column::make('loggable_type')
                ->title('Model'),
            Column::make('admin.name')
                ->title('Admin'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-end')
                ->orderable(false)
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
        return 'UserActivity_' . date('YmdHis');
    }
}
