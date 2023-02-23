<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ProfileForm extends Form
{
    public function buildForm()
    {
        $id = request()->route('profile');
        $company = auth()->user()->company_id ?: "";
        $this->add('name', Field::TEXT, [
            'label' => 'Nome do perfil',
            'rules' => "required|min:3|max:100|unique:profiles,id,{$id},id,deleted_at,NULL,company_id,{$company}"
        ]);
    }
}
