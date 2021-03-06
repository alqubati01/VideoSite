<?php

namespace App\Http\Controllers\Backend;


use App\Http\Requests\BackEnd\Categories\Store;
use App\Models\Category;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function store(Store $request)
    {
        $this->model->create($request->all());

        return redirect(route('categories.index'));
    }

    public function update($id, Store $request)
    {
        $row = $this->model->findOrFail($id);
        $row->update($request->all());

        return redirect(route('categories.edit', $row->id));
    }
}
