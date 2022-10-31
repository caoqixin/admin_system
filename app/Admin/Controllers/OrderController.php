<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Supplier;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Arr;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
        // 禁用不需要的功能
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->actions(function ($actions) {
            // 去掉编辑
        });

        // 倒序
        $grid->model()->orderByDesc('created_at');
        // 搜索
        $grid->quickSearch('order_id')->placeholder('请输入订单号MBO' . Carbon::now()->year);


        $grid->column('order_id', __('订单号'))->display(function ($order_id, $column) {
            $data = $this->repairs()->get();
            if ($data->isEmpty()) {
                return $order_id;
            }

            return $column->expand(function ($model) {
                $repairs = $model->repairs()->get()->map(function ($repair) {
                    $data = $repair->only(['id', 'problem', 'status']);
                    $url = $repair->type == 0 ? '/admin/repairs/standard/' . $repair->id
                        : '/admin/repairs/motherboard/' . $repair->id;
                    $data['id'] = "<a href=" . url($url) . ">{$repair->id}</a>";
                    $data['problem'] = implode("|", Arr::map($data['problem'], function ($item) {
                        return Category::find($item)->name;
                    }));

                    return $data;
                })->all();


                return new Table(['维修ID', '维修项', '维修状态'], $repairs);
            });
        });
        $grid->column('product_name', __('商品名称'));
        // 如果该订单属于维修订单 不能修改联系人和号码
        $grid->column('contact_name', __('联系人'))->display(function ($value, $column) {
            $data = $this->repairs()->get();
            if ($data->isNotEmpty()) {
                return $value;
            }

            return $column->editable();
        });
        $grid->column('phone_number', __('联系号码'))->display(function ($value, $column) {
            $data = $this->repairs()->get();
            if ($data->isNotEmpty()) {
                return $value;
            }

            return $column->editable();
        });
//        display(function ($status) {
//            return config('manager.order.status')[$status];
//        })
        $grid->column('status', __('订单状态'))
            ->select(config('manager.order.status'))->filter(config('manager.order.status'));
        $grid->column('supplier_id', __('供应商'))
            ->using(Supplier::all()->pluck('name', 'id')->toArray());
        $grid->column('price', __('Da pagare'))->display(function ($price) {
            return $price - $this->deposit . ' €';
        });
        $grid->column('updated_at', __('更新时间'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     */
    protected function detail($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.detail.order', ['orders' => $order->toArray()]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new Order());


        $form->footer(function ($footer) {

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();


        });
        $form->text('product_name', __('商品名称'))->required()->autofocus();
        $form->text('contact_name', __('联系人'))->required();
        $form->text('phone_number', __('联系号码'))->required();
        $form->select('status', __('订单状态'))
            ->options(config('manager.order.status'))->default(0);
        $form->select('supplier_id', __('供应商'))
            ->options(Supplier::all()->pluck('name', 'id'))->required();
        $form->currency('deposit', __('订金'))->symbol('€');
        $form->currency('price', __('价格'))->symbol('€')->required();

        return $form;
    }

}
