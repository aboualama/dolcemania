<?php
/**
 * Created by PhpStorm.
 * User: 39333
 * Date: 9/25/2018
 * Time: 10:38 AM
 */

namespace App\Providers;


use Yajra\DataTables\Html\Builder;

class CustomBuilderServiceProvider extends Builder
{
    public function addCheckbox(array $attributes = [], $position = false)
    {

        $attributes = array_merge([
            'defaultContent' => '<input type="checkbox" ' . $this->html->attributes($attributes) . '/>',
            'title'          => '<input type="checkbox" ' . $this->html->attributes($attributes + ['id' => 'dataTablesCheckbox']) . '/>',
            'data'           => 'checkbox',
            'name'           => 'checkbox',
            'orderable'      => false,
            'searchable'     => false,
            'exportable'     => false,
            'printable'      => true,
            'width'          => '10px',
        ], $attributes);
        $column = new Column($attributes);

        if ($position === true) {
            $this->collection->prepend($column);
        } elseif ($position === false || $position >= $this->collection->count()) {
            $this->collection->push($column);
        } else {
            $this->collection->splice($position, 0, [$column]);
        }

        return $this;
    }

}