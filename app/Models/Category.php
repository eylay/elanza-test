<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id'];
    protected $appends = ['breadcrumbs'];

    public function getBreadcrumbsAttribute()
    {
        $breadcrumbs = [];
        $cat = $this;

        do {
            $breadcrumbs []= $cat;
        } while ($cat = $cat->parent);

        return array_reverse($breadcrumbs);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function subs()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }
}
