<?php

namespace App\DataTables;

use App\Product;

use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class ProductDataTablesEditor extends DataTablesEditor
{
    protected $model = Product::class;


    public function creating(Product $model, array $data) {
        return $data;
    }

    public function created(Product $model, array $data) {
        $model->categories()->sync($data['categories']);
        return $data;
    }

    public function updating(Product $model, array $data) {
        $model->categories()->sync($data['categories']);
        return $data;
    }

    public function updated(Product $model, array $data) {
        return $data;
    }
    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    { return [];
       /* return [
            'title'         => 'required|unique:product',
            'default_price' => 'required',
            'quantity_tin'  => 'required',
            'vat'           => 'required',
        ];*/
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     *
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            /* 'email' => 'sometimes|required|email|' . Rule::unique($model->getTable())->ignore($model->getKey()),
             'name'  => 'sometimes|required',*/
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     *
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
}
