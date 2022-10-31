<?php

namespace App\Admin\Extensions;

class EditUser
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id->costumers[0]->id;
    }

    protected function render()
    {
        return "<a class='btn btn-xs btn-success fa fa-user' href='/admin/users/{$this->id}'></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
