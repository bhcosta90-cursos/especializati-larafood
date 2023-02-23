<?php

namespace App\Forms\Admin;

use App\Models\Table;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class OrderForm extends Form
{
    public function __construct(protected Table $table)
    {
        //
    }

    public function buildForm()
    {
        $this->add('table_id', Field::SELECT, [
            'label' => "Mesa",
            'rules' => ['nullable', 'exists:tables,id']
        ]);

        $this->add('comment', Field::TEXTAREA, [
            'label' => "Comentário",
            'rules' => ['nullable', 'max:1000']
        ]);

        $this->add('products', 'collection', [
            'type' => 'form',
            'prefer_input' => true,
            'options' => [
                'class' => ProductOrderForm::class,
                'label' => false,
            ]
        ]);
    }
}
