<?php

namespace App\Admin\Controllers;

use App\Models\Costumer;
use App\Models\Repair;
use App\Models\Warranty;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WarrantyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Warranty';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Warranty());
        $grid->model()->orderByDesc('id');
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disableBatchActions();
        $grid->disableCreateButton();

        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableDelete();
        });

        $grid->quickSearch(function ($model, $query) {
            $user = Costumer::firstWhere('phone_number', $query);
            $warranty_id = $user->repairs->first()->id;
            $model->where('repair_id', $warranty_id);
        });

        $grid->column('id', __('Id'));
        $grid->column('contact', '联系人')->display(function () {
            return Repair::find($this->repair_id)->costumers->map(function ($user) {
                return $user->name . ' | ' . $user->phone_number;
            })[0];
        });
        $grid->column('repair', '维修手机型号')->display(function () {
            return Repair::find($this->repair_id)->details->map(function ($detail) {
                return $detail->model;
            })[0];
        });
        $grid->column('taked_at', __('取件时间'));
        $grid->column('expired_at', __('到期时间'));
        $grid->column('is_expired', __('Is expired'))->display(function ($value) {
            if (!$value) {
                return "In Garanzia";
            }
            return "Scaduta";
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     */
    protected function detail($id)
    {
        $warranty = Warranty::findOrFail($id);

        $repair = Repair::findOrFail($warranty->repair_id);
        $user = $repair->costumers;
        $detail = $repair->details;
        $component = $repair->components;

        return view('admin.detail.warranty', [
            'warranty' => $warranty,
            'repair' => $repair,
            'user' => $user,
            'details' => $detail,
            'component' => $component
        ]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Warranty());

        $form->number('repair_id', __('Repair id'));
        $form->datetime('taked_at', __('Taked at'))->default(date('Y-m-d H:i:s'));
        $form->datetime('expired_at', __('Expired at'))->default(date('Y-m-d H:i:s'));
        $form->switch('is_expired', __('Is expired'));

        return $form;
    }
}
