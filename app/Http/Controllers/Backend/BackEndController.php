<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BackEndController extends Controller {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if (!empty($with)) {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);

        $title_page = $this->pluralModelName();
        $singleModelName = $this->getModelName();
        $desc_page = 'Here you can add, edit, delete ' . $title_page;
        $routeName = $this->getClassNameFromModel();

        return view('backEnd.'.$this->getClassNameFromModel().'.index',
            compact('rows', 'title_page', 'singleModelName', 'desc_page', 'routeName'));
    }

    public function create()
    {
        $title_page = 'Create ' . $this->getModelName();
        $desc_page = 'Here you can ' . $title_page;
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $append = $this->append();

        return view('backEnd.'.$this->getClassNameFromModel().'.create',
            compact( 'title_page', 'desc_page', 'routeName', 'folderName'))->with($append);
    }

    public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        $title_page = 'Edit ' . $this->getModelName();
        $desc_page = 'Here you can ' . $title_page;
        $routeName = $this->getClassNameFromModel();
        $folderName = $this->getClassNameFromModel();
        $append = $this->append();

        return view('backEnd.'.$this->getClassNameFromModel().'.edit',
            compact('row', 'title_page', 'desc_page', 'routeName', 'folderName'))->with($append);
    }

    public function destroy($id)
    {
        $this->model->findOrFail($id)->delete();
        return back();
    }

    protected function with() {
        return [];
    }

    protected function append() {
        return [];
    }

    protected function filter($rows) {
        return $rows;
    }

    protected function getClassNameFromModel() {
        return strtolower($this->pluralModelName());
    }

    protected function pluralModelName() {
        return Str::plural($this->getModelName());
    }

    protected function getModelName() {
        return class_basename($this->model);
    }
}
