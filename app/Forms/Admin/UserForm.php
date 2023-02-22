<?php

namespace App\Forms\Admin;

use App\Models\Role;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function __construct(protected Role $role)
    {
        //
    }

    public function buildForm()
    {
        $this->add('role_id', Field::SELECT, [
            'label' => "Cargos",
            'choices' => $this->role->orderBy('name')->pluck('name', 'id')->toArray(),
            'empty_value' => "Selecione..."
        ]);

        $id = request()->route('user');
        $company = auth()->user()->company_id ?: "";
        $this->add('name', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|string|min:3|max:100"
        ]);

        $this->add('email', Field::EMAIL, [
            'label' => 'E-mail',
            'rules' => "required|email|min:3|max:100|unique:users,id,{$id},id,deleted_at,NULL,company_id,{$company}"
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
