<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class DetailPlanForm extends Form
{
    public function buildForm()
    {
        $this->add('name', Field::TEXT, [
            'label' => 'Detalhe do plano',
            'rules' => "required|min:3|max:100"
        ]);
    }
}
