<?php

namespace App\Admin\Controllers;

use App\Models\Supplier;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SupplierController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Supplier';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Supplier());
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

        $grid->column('name', __('供应商名称'))->editable();
        $grid->column('site', __('站点'))->editable();
        $grid->column('username', __('登录名'))->editable();
        $grid->column('password', __('登录密码'))->editable();

        $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
            $create->text('name', '供应商名称')->required();
            $create->url('site', '网址');
            $create->text('username', '登录名');
            $create->text('password', '登陆密码');
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
        $show = new Show(Supplier::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('site', __('Site'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
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
        $form = new Form(new Supplier());

        $form->text('name', __('Name'));
        $form->text('site', __('Site'));
        $form->text('username', __('Username'));
        $form->text('password', __('Password'));

        return $form;
    }
}
