<?php

namespace App\Admin\Controllers\Render;

use App\Models\Component;
use App\Models\Category;
use Encore\Admin\Grid\Selectable;

class Components extends Selectable
{
    public $model = Component::class;

    public function make()
    {
        $this->model()->where('is_finish', '!=', false);

        $this->column('id');
        $this->column('name');
        $this->column('brand')->using(config('manager.component.brand'));
        $this->column('quality')->using(config('manager.component.quality'));

        $this->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->where(function ($query) {

                $query->where('name', 'like', "%{$this->input}%")
                    ->orWhere('aliasName', 'like', "%{$this->input}%");
            }, '配件名称');
            // 分类
            $filter->where(function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('category_id', $this->input);
                });
            }, '分类')->select(Category::where('type', 0)->pluck('name', 'id'));
            $filter->equal('brand', '品牌')->select(config('manager.component.brand'));
            $filter->equal('quality', '质量')->select(config('manager.component.quality'));
        });
    }
}
