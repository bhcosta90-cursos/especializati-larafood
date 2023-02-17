<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    public function buildForm()
    {
        $id = request()->route('permission');
        $this->add('name', Field::TEXT, [
            'label' => 'Nome da permissão',
            'rules' => "required|min:3|max:100|unique:permissions,id,{$id},id,deleted_at,NULL"
        ]);
    }
}
