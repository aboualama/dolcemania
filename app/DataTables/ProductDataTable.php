<?php

    namespace App\DataTables;

    use App\product;
    use Yajra\DataTables\DataTables;
    use Yajra\DataTables\Services\DataTable;

    class ProductDataTable extends DataTable
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
            return DataTables::make($query);
        }

        /**
         * Get query source of dataTable.
         *
         * @param \App\product $model
         *
         * @return \Illuminate\Database\Eloquent\Builder
         */
        public function query(product $model)
        {

            $x = $model->newQuery()->with('categories')->select('id', 'title', 'quantity_tin', 'default_price', 'vat');
            //  $x = Datatables::of($x)->make();
            return $x;

            //  return $model->newQuery()->select('id', 'title', 'quantity_tin', 'default_price', 'vat');
        }

        /**
         * Optional method if you want to use html builder.
         *
         * @return \Yajra\DataTables\Html\Builder
         */
        public function html()
        {
            $htmlBuilder = $this->builder()
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->addAction(['width' => '80px'])
                ->parameters([

                                 'dom'     => 'Bfrtip',
                                 'select'  => [

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
            return ['id',
                    'title',
                    'quantity_tin',
                    'default_price',
                    'vat',
                    'categories' =>[
                        'defaultContent'=>'',
                        'data'=>'categories',
                        'render' => 'function(){
                   var option = "";
                    if(data.length>0)
                    {
                    $.each(data, function(i, e) {
                     
                     if (option == "")
                     {
                        option = e.title;
                     }else{
                        option = option + ", " +e.title;
                        }
                    });
                    }else{
                        option = "";
                        }
                       
                        
                        return option;
                
                    }'
                    ]
            ];
        }

        /**
         * Get filename for export.
         *
         * @return string
         */
        protected function filename()
        {
            return 'Product_' . date('YmdHis');
        }
    }
