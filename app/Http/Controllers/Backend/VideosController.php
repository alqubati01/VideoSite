<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Str;

class VideosController extends BackEndController
{
    use CommentTrait;
    public function __construct(Video $model)
    {
        parent::__construct($model);
    }

    function with()
    {
        return ['user', 'category'];
    }

    function append()
    {
        $array = [
            'categories' => Category::get(),
            'skills' => Skill::get(),
            'tags' => Tag::get(),
            'selectedSkills' => [],
            'selectedTags' => [],
            'comments' => []
        ];

        $id = request()->route()->parameter('video');
        if ($id) {
            $array['selectedSkills'] =
                $this->model->find($id)->skills()->get()->pluck('id')->toArray();
            $array['selectedTags'] =
                $this->model->find($id)->tags()->get()->pluck('id')->toArray();
            $array['comments'] =
                $this->model->find($id)->comments()->orderby('id', 'DESC')->get();
        }

        return $array;
    }

    public function store(Store $request)
    {
        $fileName = $this->uploadImage($request);

        $requestArray = ['user_id' => auth()->user()->id, 'image' => $fileName] + $request->all();
        $row = $this->model->create($requestArray);

        $this->syncTagsAndSkills($row, $requestArray);

        return redirect(route('videos.index'));
    }

    public function update($id, Update $request)
    {
        $requestArray = $request->all();

        if ($request->hasFile('image')) {
            $fileName = $this->uploadImage($request);

            $requestArray = ['image' => $fileName] + $requestArray;
        }

        $row = $this->model->findOrFail($id);
        $row->update($requestArray);

        $this->syncTagsAndSkills($row, $requestArray);

        return redirect(route('videos.edit', $row->id));
    }

    protected function syncTagsAndSkills($row, $requestArray) {
        if(isset($requestArray['skills']) && !empty($requestArray['skills'])) {
            $row->skills()->sync($requestArray['skills']);
        }

        if(isset($requestArray['tags']) && !empty($requestArray['tags'])) {
            $row->tags()->sync($requestArray['tags']);
        }
    }

    protected function uploadImage($request) {
        $file = $request->file('image');
        $fileName = time().Str::random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $fileName);

        return $fileName;
    }
}
