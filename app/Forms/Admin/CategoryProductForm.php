<?php

namespace App\Forms\Admin;

use App\Models\Category;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CategoryProductForm extends Form
{
    public function __construct(private Category $category)
    {
        //
    }

    public function buildForm()
    {
        $this->add('categories', Field::CHOICE, [
            'label' => 'Categorias',
            'choices' => $this->category->pluck('name', 'id')->toArray(),
            'choice_options' => [
                'wrapper' => ['class' => 'icheck-primary'],
                'label_attr' => ['class' => 'label-class'],
            ],
            'expanded' => true,
            'multiple' => true,
        ]);
    }
}
