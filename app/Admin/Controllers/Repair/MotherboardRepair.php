<?php

namespace App\Admin\Controllers\Repair;

use App\Admin\Controllers\Render\ShowDetail;
use App\Admin\Extensions\EditPhoneDetail;
use App\Admin\Extensions\EditUser;
use App\Models\Category;
use App\Models\Component;
use App\Models\Costumer;
use App\Models\Repair;
use App\Models\RepairDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Arr;

class MotherboardRepair extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '主板维修';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Repair());
        // 倒序排序
        $grid->model()->where('type', 1)->orderByDesc('created_at');
        // 禁用不需要的功能
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableColumnSelector();

        $grid->actions(function ($actions) {
            $actions->append(new EditUser($actions->row));
            $actions->append(new EditPhoneDetail($actions->row));
        });
        // 隐藏不必要的列
        $grid->hiddenColumns = ['type', 'updated_at', 'deposit', 'price'];
        $grid->column('id', __('Id'))->modal("详情", ShowDetail::class);
        $grid->column('type', __('Type'));
        $grid->column('deposit', __('押金'));
        $grid->column('price', __('维修价格'));

        $grid->column('problem', __('维修项'))->display(function ($problems) {
            return Arr::map($problems, function ($problem) {
                return Category::find($problem)->name;
            });
        })->label();

        $grid->column('costumers', '客户联系方式')->display(function ($costumers) {
            return implode('', Arr::map($costumers, function ($costumer) {
                return $costumer['phone_number'];
            }));
        });

        $grid->column('details', '手机型号')->display(function ($details) {
            return implode('', Arr::map($details, function ($details) {
                return $details['model'];
            }));
        });
        $grid->column('status', __('状态'))->select(config('manager.repair.status.motherboard'));

        $grid->column('money', '应付款')->display(function () {
            return $this->price - $this->deposit . ' €';
        });
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('Updated at'));

        // 计算总维修数
        $grid->footer(function ($query) {
            $total = $query->where('type', 1)->count();
            $no_repair = $query->where('type', 1)->where(function ($query) {
                $query->where('status', 0)
                    ->orWhere('status', 1);
            })->count();
            $repaired = $total - $no_repair;
            return "
<div style='padding: 10px;'>总维修数 ：$total </div>
<div style='padding: 10px;'>未维修数 ：$no_repair </div>
<div style='padding: 10px;'>已完成数 ：$repaired </div>";
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
        $repair = Repair::findOrFail($id);
        $user = $repair->costumers;
        $detail = $repair->details;

        return view('admin.detail.repair', ['repairs' => $repair->toArray()]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Repair());
        if ($form->isCreating()) {
            // customers
            $form->hidden('type', '维修类型')
                ->value(array_search('motherboard', config('manager.repair.type')));
            $form->text('costumers.name', '客户名称')->required();
            $form->text('costumers.phone_number', '联系号码')
                ->required();

            // 手机详情
            $form->text('details.model', '型号')->required();
            $form->text('details.password', '手机密码');
            $form->text('details.imei', 'IMEI');
            $form->text('details.note', '备注');
        }

        // 维修情况
        $form->multipleSelect('problem', __('维修项'))
            ->options(Category::where('type', 0)->get()->pluck('name', 'id'))->required();
        $form->select('status', __('状态'))->options(config('manager.repair.status.motherboard'));
        $form->currency('deposit', __('订金'))->symbol('€');
        $form->currency('price', __('价格'))->symbol('€')->required();

        $form->saved(function (Form $form) {

            $customers_data = $form->costumers;
            $details = $form->details;
            $repiar_id = $form->model()->id;
            // 创建
            if ($form->isCreating() && $repiar_id) {


                // 如果维修单号创建成功 && 创建用户和手机信息
                $customers_data['created_at'] = $form->model()->created_at;
                $user = $this->createUser($customers_data, $repiar_id);

                // 创建手机详情
                $detail = $this->createDetail($details, $repiar_id);

            }
        });

        return $form;
    }

    // 创建用户
    protected function createUser($data, $repair_id)
    {
        // 创建客户
        $user = Costumer::where('phone_number', $data['phone_number'])->firstOr(function () use ($data) {
            return Costumer::create([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'last_repaired_at' => $data['created_at']
            ]);
        });

        $user->update(['last_repaired_at' => $data['created_at']]);
        $user->repairs()->attach($repair_id);

        return $user->id;
    }

    // 创建手机详情
    protected function createDetail($data, $repair_id)
    {
        $detail = RepairDetail::create($data);
        $detail->repairs()->attach($repair_id);

        return $detail->id;
    }
}
