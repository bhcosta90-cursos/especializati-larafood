<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class RoleForm extends Form
{
    public function buildForm()
    {
        $url = request()->route('role');
        $company = auth()->user()->company_id ?: "";
        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|min:3|max:100|unique:plans,name,{$url},id,deleted_at,NULL,company_id,{$company}"
        ]);

    }
}
