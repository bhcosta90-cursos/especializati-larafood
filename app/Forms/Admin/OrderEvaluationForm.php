<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class OrderEvaluationForm extends Form
{
    public function buildForm()
    {
        $this->add('star', Field::SELECT, [
            'label' => "Estrelas",
            'rules' => ['required', 'in:0,1,2,3,4,5']
        ]);

        $this->add('comment', Field::TEXTAREA, [
            'label' => "Mesa",
            'rules' => ['nullable', 'max:1000']
        ]);
    }
}
