<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Component;
use App\Models\Supplier;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class ComponentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '配件管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Component());

        // 禁用不需要的功能
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disableFilter();

        // 规格选择器
        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('brand', '品牌', config('manager.component.brand'));
            $selector->select('quality', '品质', config('manager.component.quality'));
            // 类型分类
            $selector->select('categories', '分类',
                Category::where('type', 0)->get()->pluck('name', 'id')->toArray(), function ($query, $value) {
                    $categories = Category::find($value[0]);
                    $component_id = $categories->components()->get()->map(function ($components) {
                        return $components->pivot->component_id;
                    });
                    $query->whereIn('id', $component_id);
                });
            // 屏幕品牌分类
            $selector->select('dispaly_categories', '屏幕品牌',
                Category::where('type', 2)->get()->pluck('name', 'id')->toArray(), function ($query, $value) {
                    $categories = Category::find($value[0]);
                    $component_id = $categories->components()->get()->map(function ($components) {
                        return $components->pivot->component_id;
                    });
                    $query->whereIn('id', $component_id);
                });
        });
        // 搜索
        $grid->quickSearch('name', 'aliasName')->placeholder('输入配件名称');
        $grid->column('name', __('名称'))->editable();
        $grid->column('categories', __('分类'))->display(function ($categories) {
            $categories = array_map(function ($category) {
                return "<span class='label label-success'>{$category['name']}</span>";
            }, $categories);
            return $categories;
        })->label();
        $grid->column('brand', __('品牌'))->using(config('manager.component.brand'));
        $grid->column('quality', __('品质'))->using(config('manager.component.quality'));
        $grid->column('supplier_id', __('供应商'))
            ->using(Supplier::all()->pluck('name', 'id')->toArray());
        $grid->column('stock', __('库存数量'));
        $grid->column('is_finish', __('库存情况'))->using(['缺货', '有货'])->dot(['danger', 'success']);
        $grid->column('purchase_price', __('进价'))->suffix(' €');

        // 计算总配件数 和总配件价格
        $grid->footer(function ($query) {
            $amount = $query->sum('stock');
            $total = $query->selectRaw('stock * purchase_price as total')->get()->sum('total');
            return "
<div style='padding: 10px;'>总配件数 ： $amount</div>
<div style='padding: 10px;'>总价格 ： $total €</div>";
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
        $show = new Show(Component::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'));
        $show->field('brand', __('Brand'));
        $show->field('name', __('Name'));
        $show->field('aliasName', __('AliasName'));
        $show->field('quality', __('Quality'));
        $show->field('supplier_id', __('Supplier id'));
        $show->field('purchase_price', __('Purchase price'));
        $show->field('stock', __('Stock'));
        $show->field('is_finish', __('Is finish'));
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
        $form = new Form(new Component());


        $form->text('name', __('名称'))->required();
        $form->text('aliasName', __('通用名称'));

        $form->select('brand', __('品牌'))
            ->options(config('manager.component.brand'))->required();

        $form->multipleSelect('categories', __('分类'))
            ->options(Category::where('type', 0)->orWhere('type', 2)->get()->pluck('name', 'id'))->required();

        $form->select('quality', __('品质'))->options(config('manager.component.quality'));
        $form->select('supplier_id', __('供应商'))->required()
            ->options(Supplier::all()->pluck('name', 'id'));
        $form->number('stock', __('库存数量'))->default(1)->creationRules('gt:0', [
            'gt' => '库存数量不能小于0'
        ])->updateRules('gte:0', [
            'gte' => '库存数量不能小于0'
        ]);
        $form->currency('purchase_price', __('进价'))->symbol('€')->required();
        $form->switch('is_finish', __('库存情况'))
            ->states(config('manager.component.states'))
            ->default(1);

//        $form->saving(function (Form $form) {
//            if ($form->isEditing() && $form->stock == 0) {
//                $form->is_finish = !$form->is_finish;
//            }
//        });
        return $form;
    }
}
