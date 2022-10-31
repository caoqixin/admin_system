<?php

namespace App\Admin\Controllers;

use App\Admin\Controllers\Render\showUserRepair;
use App\Models\Costumer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CostumerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '客户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Costumer());

        // 禁用不需要的功能
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->actions(function ($actions) {
            // 去掉编辑
            $actions->disableEdit();
            $actions->disableDelete();
        });

        $grid->quickSearch('phone_number', 'name');

        $grid->column('id', __('Id'))->modal('维修记录', showUserRepair::class);
        $grid->column('name', __('名称'))->editable();
        $grid->column('phone_number', __('联系号码'))->editable();
        $grid->column('last_repaired_at', __('最后维修记录'));
        $grid->column('created_at', __('创建时间'));

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
        $show = new Show(Costumer::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone_number', __('Phone number'));
        $show->field('last_repaired_at', __('Last repaired at'));
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
        $form = new Form(new Costumer());

        $form->text('name', __('Name'));
        $form->text('phone_number', __('Phone number'));
        $form->datetime('last_repaired_at', __('Last repaired at'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
