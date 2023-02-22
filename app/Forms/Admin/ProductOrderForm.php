<?php

namespace App\Forms\Admin;

use App\Models\Product;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class ProductOrderForm extends Form
{
    public function __construct(protected Product $product)
    {
        //
    }

    public function buildForm()
    {
        $this->add('product_id', Field::SELECT, [
            'label' => "Produto",
            'rules' => ['required', 'exists:products,id']
        ]);

        $this->add('quantity', Field::NUMBER, [
            'label' => "Produto",
            'rules' => ['required', 'min:1', 'max:1000']
        ]);
    }
}
