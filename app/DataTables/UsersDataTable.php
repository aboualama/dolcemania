<?php

namespace App\DataTables;

use App\User;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     *
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->setRowId('id')
            ->addColumn('password', '******');


    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'name', 'email');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @param Builder $builder
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    public function html()
    {

        $htmlBuilder = $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'        => "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>> <'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                //   'dom'        => 'Bfrtip',
                'order'      => [1, 'asc'],
                'select'     => [

                    'style'     => 'multiple',
                    'selector'  => 'td:first-child input:checkbox',
                    'items'     => 'row',
                    'blurable'  => 'true',
                    'className' => 'table-active'
                ],
                'pageLength' => 20,
                'lengthMenu' => [[20, 50, 100], [20, 50, 100]],
                "responsive" => true,

                /*    'buttons'      => ['export', 'print', 'reset', 'reload'],*/
                'buttons'    => [
                    ['extend' => 'create', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'edit', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'remove', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'copy', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'csv', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'print', 'className' => 'btn btn-sm btn-primary'],


                ]
            ]);
        $htmlBuilder->addCheckbox(
            [
                'render' => value(function () {


                    $chebox = '"' . "<div class='custom-control custom-checkbox custom-control-primary d-inline-block'><input type='checkbox' class='custom-control-input' id=" . 'ch_"+' . 'data' . '+"' . ">";
                    $lable = "<label class='custom-control-label' for=" . 'ch_"+' . 'data' . '+"' . "></label></div>" . '"';
                    return $chebox . $lable;
                }),

                'data'  => 'id',
                'title' => '<div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>'
            ], true);

        return $htmlBuilder;

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [

            'id',
            'name',
            'email',

        ];


    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
