<?php

namespace App\Http\Controllers\Admin;

use App\Company\ManagerCompany;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\FormSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(private Product $repository)
    {
        $this->middleware('can:products');
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.products.index', compact('profiles'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\ProductForm::class, route('admin.products.store'));
        return view('admin.products.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\ProductForm::class);

        $data['image'] = $data['image']->store('companies/' . app(ManagerCompany::class)->getCompanyIdentify() . '/products');

        $obj = $this->repository->withTrashed()->firstOrCreate(['title' => $data['title']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.products.index')->with('success', 'Produto cadastrado com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\ProductForm::class, route('admin.products.update', $rs->id), $rs);
        return view('admin.products.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\ProductForm::class);

        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        if (!empty($data['image'])) {
            if ($rs->image && Storage::exists($rs->image)) {
                Storage::delete($rs->image);
            }
            $data['image'] = $data['image']->store('companies/' . app(ManagerCompany::class)->getCompanyIdentify() . '/products');
        } else {
            unset($data['image']);
        }

        $rs->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Produto editado com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.products.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        if ($rs->image && Storage::exists($rs->image)) {
            Storage::delete($rs->image);
        }
        $rs->delete();

        return redirect()->route('admin.products.index')->with('warning', 'Produto deletado com sucesso');
    }
}
