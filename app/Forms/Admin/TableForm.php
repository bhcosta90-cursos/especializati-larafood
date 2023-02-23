<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class TableForm extends Form
{
    public function buildForm()
    {
        $id = request()->route('table');
        $company = auth()->user()->company_id ?: "";
        $this->add('identify', Field::TEXT, [
            'label' => 'Identificador',
            'rules' => "required|max:100|unique:tables,id,{$id},id,deleted_at,NULL,company_id,{$company}"
        ]);

        $this->add('description', Field::TEXT, [
            'label' => 'Descrição',
            'rules' => 'nullable|min:3|max:100'
        ]);
    }
}
