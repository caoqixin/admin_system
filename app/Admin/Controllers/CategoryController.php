<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        // 禁用不需要的功能
        $grid->disableFilter();
        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->disableTools();
        $grid->actions(function ($actions) {

            // 去掉编辑
            $actions->disableEdit();

            // 去掉查看
            $actions->disableView();
        });

        $grid->column('id', __('Id'));
        $grid->column('type', __('类型'))->display(function ($type) {
            return config('manager.category_type')[$type];
        });
        $grid->column('name', __('分类名称'))->editable();

        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('name', '分类名称')->required();
            $create->select('type', '分类类型')
                ->options(config('manager.category_type'))->default(0);
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type', __('Type'));
        $show->field('name', __('Name'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->switch('type', __('Type'));
        $form->text('name', __('Name'));

        return $form;
    }
}
