<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\RepairDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RepairDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RepairDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RepairDetail());
        // 禁用不需要的功能
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disableActions();
        $grid->disableCreateButton();

        $grid->column('id', __('Id'));
        $grid->column('model', __('型号'));
        $grid->column('problem', '维修问题')->display(function () {
            return $this->repairs->map(function ($repair) {
                return Category::find($repair->problem)->map(function ($item) {
                    return $item->name;
                })[0];
            });
        })->label();

        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(RepairDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('model', __('Model'));
        $show->field('password', __('Password'));
        $show->field('imei', __('Imei'));
        $show->field('note', __('Note'));
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
        $form = new Form(new RepairDetail());

        $form->text('model', __('Model'));
        $form->password('password', __('Password'));
        $form->text('imei', __('Imei'));
        $form->textarea('note', __('Note'));

        return $form;
    }
}
