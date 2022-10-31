<?php

namespace App\Admin\Forms;

use App\Models\Repair;
use Carbon\Carbon;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Warranty extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '保修';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {


        $warranty = new \App\Models\Warranty([
            'taked_at' => Carbon::createFromDate($request->input('take')),
            'expired_at' => Carbon::createFromDate($request->input('take'))->addDays($request->input('time'))
        ]);

        $repair = Repair::findOrFail($request->input('repair_id'));
        $repair->warranty()->save($warranty);

        admin_success('记录保修成功');

        return redirect('/admin/warranties');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->hidden('repair_id');
        $this->date('taked_at', '取件时间');
        $this->number('time', '保修有效天数')->placeholder('天数');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'taked_at' => session('take'),
            'repair_id' => $this->data['repair_id']
        ];
    }
}
