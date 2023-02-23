<?php

namespace App\Forms\Admin;

use App\Company\ManagerCompany;
use App\Models\Permission;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class PermissionRoleForm extends Form
{
    public function __construct(private Permission $permission)
    {
        //
    }

    public function buildForm()
    {
        $dataPermissions = collect(app(ManagerCompany::class)->getPermissionByCompany());

        $this->add('permissions', Field::CHOICE, [
            'label' => 'Permissões',
            'choices' => $dataPermissions->pluck('name', 'id')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
    }
}
