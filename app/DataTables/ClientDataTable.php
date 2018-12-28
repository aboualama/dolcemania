<?php

namespace App\DataTables;

use App\Client;
use App\User;
use Yajra\DataTables\Services\DataTable;

class ClientDataTable extends DataTable
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
        return datatables($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Client $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Client $model)
    {
        return $model->newQuery()->select('company_name', 'reference_name', 'p_iva', 'legal_address', 'operative_address', 'phone_number', 'cell_number', 'web_adress', 'is_customer', 'is_supplier', 'is_user', 'bank_iban', 'bank_swift', 'bank_name', 'payment_term', 'payment_method', 'payment_typology', 'vat', 'product_prices_name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $htmlBuilder =  $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters([

                'dom'     => 'Bfrtip',
                'select'     => [

                    'style'     => 'multiple',
                    'selector'  => 'td:first-child ',
                    'items'     => 'row',
                    'blurable'  => 'true',
                    'className' => 'table-active'
                ],
                'buttons' => [
                    ['extend' => 'create', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'edit', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'remove', 'editor' => 'editor', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'copy', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'csv', 'className' => 'btn btn-sm btn-primary'],
                    ['extend' => 'print', 'className' => 'btn btn-sm btn-primary'],


                ]
            ]);
        $htmlBuilder->addAction();
        return $htmlBuilder;

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return ['company_name', 'reference_name', 'p_iva', 'legal_address', 'operative_address', 'phone_number', 'cell_number', 'web_adress', 'is_customer', 'is_supplier', 'is_user', 'bank_iban', 'bank_swift', 'bank_name', 'payment_term', 'payment_method', 'payment_typology', 'vat', 'product_prices_name'];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Client_' . date('YmdHis');
    }
}
