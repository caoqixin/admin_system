<?php

namespace App\Admin\Tools;

use Encore\Admin\Grid;
use Encore\Admin\Grid\Tools\AbstractTool;

class CreateByTypeButton extends AbstractTool
{

    /**
     * @var Grid
     */
    protected $grid;

    protected $type;

    /**
     * Create a new CreateByTypeButton instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid, $type)
    {
        $this->grid = $grid;
        $this->type = $type;
    }

    /**
     * Render CreateByTypeButton.
     *
     * @return string
     */
    public function render()
    {

        $new = trans('admin.new');

        return <<<EOT

<div class="btn-group pull-right grid-create-btn" style="margin-right: 10px">
    <a href="{$this->grid->getCreateUrl()}?type={$this->type}" class="btn btn-sm btn-success" title="{$new}">
        <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;{$new}</span>
    </a>
</div>

EOT;
    }
}
