<?php

namespace App\Forms\Admin;

use App\Models\Permission;
use App\Models\Profile;
use Kris\LaravelFormBuilder\{Form, Field};

class PlanProfileForm extends Form
{
    public function __construct(private Profile $profile)
    {
    }

    public function buildForm()
    {
        $this->add('profiles', Field::CHOICE, [
            'label' => 'Perfis',
            'choices' => $this->profile->pluck('name', 'id')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
    }
}
