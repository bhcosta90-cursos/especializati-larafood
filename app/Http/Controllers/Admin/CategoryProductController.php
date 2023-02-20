<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function __construct(protected Product $repository)
    {
        $this->middleware('can:products');
    }

    public function index(string $id, FormSupport $formSupport)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $rs->categories = $rs->categories->pluck('id')->toArray();
        $form = $formSupport->run(\App\Forms\Admin\CategoryProductForm::class, route('admin.products.categories.store', $id), $rs);

        return view('admin.products.categories.index', compact('form'));
    }

    public function store(string $id, FormSupport $formSupport)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $data = $formSupport->data(\App\Forms\Admin\CategoryProductForm::class);

        $rs->categories()->sync($data['categories']);

        return redirect()->route('admin.products.show', $id)->with('success', 'Categorias vinculadas com sucesso');
    }
}
