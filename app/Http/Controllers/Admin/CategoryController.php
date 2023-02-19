<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private Category $repository)
    {
        //
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.categories.index', compact('profiles'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\CategoryForm::class, route('admin.categories.store'));
        return view('admin.categories.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\CategoryForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['name' => $data['name']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Categoria cadastrada com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->where('url', $id)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\CategoryForm::class, route('admin.categories.update', $rs->url), $rs);
        return view('admin.categories.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $url)
    {
        $data = $formSupport->data(\App\Forms\Admin\CategoryForm::class);

        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Categoria editada com sucesso');
    }

    public function show(string $url)
    {
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.categories.show', compact('rs'));
    }

    public function destroy(string $url)
    {
        $rs = $this->repository->where('url', $url)->first();

        if (!$rs) {
            return redirect()->back();
        }

        $rs->delete();

        return redirect()->route('admin.categories.index')->with('warning', 'Categoria deletada com sucesso');
    }
}
