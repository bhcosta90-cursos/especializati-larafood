<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private Role $repository)
    {
        $this->middleware('can:categories');
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.roles.index', compact('profiles'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\RoleForm::class, route('admin.roles.store'));
        return view('admin.roles.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\RoleForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['name' => $data['name']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Cargo cadastrado com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\RoleForm::class, route('admin.roles.update', $rs->id), $rs);
        return view('admin.roles.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\RoleForm::class);

        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.roles.index')->with('success', 'Cargo editado com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.roles.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        $rs->delete();

        return redirect()->route('admin.roles.index')->with('warning', 'Cargo deletado com sucesso');
    }
}
