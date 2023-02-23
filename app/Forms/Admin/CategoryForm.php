<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CategoryForm extends Form
{
    public function buildForm()
    {
        $url = request()->route('category');
        $company = auth()->user()->company_id ?: "";
        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|min:3|max:100|unique:plans,name,{$url},url,deleted_at,NULL,company_id,{$company}"
        ]);

        $this->add('description', Field::TEXT, [
            'label' => 'Descrição',
            'rules' => 'nullable|min:3|max:100'
        ]);
    }
}
