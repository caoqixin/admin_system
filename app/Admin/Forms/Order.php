<?php

namespace App\Admin\Forms;

use App\Models\Supplier;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Order extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '维修订单创建';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        $order = \App\Models\Order::create($request->except('repair_id'));

        $order->repairs()->attach($request->input('repair_id'));

        admin_success("订单创建创建成功", $order->order_id . '创建成功');
        return redirect('/admin/repairs/standard');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->hidden('repair_id');
        $this->text('product_name', __('商品名称'))->required()->autofocus();
        $this->text('contact_name', __('联系人'))->required();
        $this->text('phone_number', __('联系号码'))->required();
        $this->select('status', __('订单状态'))
            ->options(config('manager.order.status'))->default(0);
        $this->select('supplier_id', __('供应商'))
            ->options(Supplier::all()->pluck('name', 'id'))->required();
        $this->currency('deposit', __('订金'))->symbol('€');
        $this->currency('price', __('价格'))->symbol('€')->required();
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'product_name' => request()->old('details.model'),
            'contact_name' => request()->old('costumers.name'),
            'phone_number' => request()->old('costumers.phone_number'),
            'status' => 0,
            'deposit' => request()->old('deposit'),
            'price' => request()->old('price'),
            'repair_id' => $this->data['repair_id']
        ];
    }
}
