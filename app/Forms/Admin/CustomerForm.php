<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CustomerForm extends Form
{
    public function buildForm()
    {
        $url = request()->route('customer');

        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|min:3|max:100"
        ]);

        $this->add('email', Field::EMAIL, [
            'label' => 'E-mail',
            'rules' => "required|min:3|max:100|unique:customers,email,{$url},id,deleted_at,NULL"
        ]);

        $this->add('password', Field::PASSWORD, [
            'label' => 'Senha',
            'rules' => "required|min:3|max:16"
        ]);
    }
}
