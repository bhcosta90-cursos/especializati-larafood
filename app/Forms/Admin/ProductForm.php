<?php

namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class ProductForm extends Form
{
    public function buildForm()
    {
        $id = request()->route('product');
        $this->add('title', Field::TEXT, [
            'label' => 'Nome',
            'rules' => "required|min:3|max:100|unique:products,title,{$id},id,deleted_at,NULL"
        ]);

        $this->add('flag', Field::TEXT, [
            'label' => 'Flag',
            'rules' => 'nullable|min:3|max:100'
        ]);

        $this->add('image', Field::FILE, [
            'label' => 'Imagem',
            'rules' => ['image', $id ? "nullable" : "required"]
        ]);

        $this->add('description', Field::TEXT, [
            'label' => 'Descrição',
            'rules' => 'nullable|min:3|max:100'
        ]);

        $this->add('price', Field::NUMBER, [
            'label' => 'Preço',
            'rules' => 'required|numeric|min:0|max:999999'
        ]);
    }
}
