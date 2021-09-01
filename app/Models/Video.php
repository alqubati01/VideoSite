<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['user_id', 'category_id', 'name', 'description',
        'youtube', 'published', 'image', 'meta_keyword', 'meta_description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function skills() {
        return $this->belongsToMany(Skill::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished(){
        return $this->where('published' , 1);
    }
}
