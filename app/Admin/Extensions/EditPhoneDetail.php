<?php

namespace App\Admin\Extensions;

class EditPhoneDetail
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id->details[0]->id;
    }

    protected function render()
    {
        return "<a class='btn btn-xs btn-success fa fa-mobile-phone pl-2' href='/admin/phone-model/{$this->id}/edit'></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
