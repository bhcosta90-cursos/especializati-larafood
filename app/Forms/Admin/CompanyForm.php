<?php

namespace App\Forms\Admin;

use App\Models\Plan;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CompanyForm extends Form
{
    public function __construct(protected Plan $plan){
        //
    }

    public function buildForm()
    {
        $this->add('plan_id', Field::SELECT, [
            'label' => "Plano",
            'choices' => $this->plan->orderBy('name')->pluck('name', 'id')->toArray(),
        ]);

        $this->add('cnpj', Field::TEXT, [
            'label' => "CNPJ",
            'rules' => 'required|min:14|max:14',
        ]);

        $this->add('name', Field::TEXT, [
            'label' => "Nome",
            'rules' => 'required|min:3|max:100',
        ]);

        $this->add('email', Field::TEXT, [
            'label' => "E-mail",
            'rules' => 'required|email|min:3|max:100',
        ]);

        $this->add('logo', Field::FILE, [
            'label' => 'Logo',
            'rules' => ['image', "nullable"]
        ]);

        $this->add('active', Field::CHECKBOX, [
            'label' => 'Ativo',
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
        ]);

        $this->add('subscription', Field::DATE, [
            'label' => 'Data da inscrição',
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
        ]);

        $this->add('expires_at', Field::DATE, [
            'label' => 'Data da expiração',
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
        ]);
    }
}
