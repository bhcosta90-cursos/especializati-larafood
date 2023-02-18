<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $id = request()->route('user');
        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|string|min:3|max:100"
        ]);

        $this->add('email', Field::EMAIL, [
            'label' => 'E-mail',
            'rules' => "required|email|min:3|max:100|unique:users,id,{$id},id,deleted_at,NULL"
        ]);

        if (empty($id)) {

            $this->add('password', Field::PASSWORD, [
                'label' => 'Senha',
                'rules' => "required|string|min:3|max:100|confirmed"
            ]);


            $this->add('password_confirmation', Field::PASSWORD, [
                'label' => 'Confirmar senha',
                'rules' => "required|string|min:3|max:100"
            ]);
        }
    }
}
