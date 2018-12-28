<?php

namespace App\DataTables;

use App\User;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;
use Illuminate\Database\Eloquent\Model;

class ClientDataTablesEditor extends DataTablesEditor
{
    protected $model = Client::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    { return [];
        /* return [
             'title'         => 'required|unique:Client',
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
