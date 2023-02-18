<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(private Permission $repository)
    {
        //
    }

    public function index(Request $request)
    {
        $permissions = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\PermissionForm::class, route('admin.permissions.store'));
        return view('admin.permissions.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\PermissionForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['name' => $data['name']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.permissions.index')->with('success', 'Permissão cadastrada com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\PermissionForm::class, route('admin.permissions.update', $rs->id), $rs);
        return view('admin.permissions.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\PermissionForm::class);

        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.permissions.index')->with('success', 'Permissão editada com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.permissions.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        $rs->delete();

        return redirect()->route('admin.permissions.index')->with('warning', 'Permissão deletada com sucesso');
    }
}
