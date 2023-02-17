<?php

namespace App\Forms\Admin;

use App\Models\Permission;
use Kris\LaravelFormBuilder\{Form, Field};

class ProfilePermissionForm extends Form
{
    public function __construct(private Permission $permission)
    {
    }

    public function buildForm()
    {
        $this->add('permissions', Field::CHOICE, [
            'choices' => $this->permission->pluck('name', 'id')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
    }
}
