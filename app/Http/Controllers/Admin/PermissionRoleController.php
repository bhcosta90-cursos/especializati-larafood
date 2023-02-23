<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    public function __construct(private Role $repository)
    {
        $this->middleware('can:roles');
    }

    public function index(string $id, FormSupport $formSupport)
    {
        $rs = $this->repository->where('id', $id)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $rs->permissions = $rs->permissions->pluck('id')->toArray();
        $form = $formSupport->run(\App\Forms\Admin\PermissionRoleForm::class, route('admin.roles.permissions.store', $id), $rs);

        $title = $rs->name;
        $details = $rs->permissions()->get();
        return view('admin.roles.permissions.index', compact('details', 'form', 'id', 'title'));
    }

    public function store(FormSupport $formSupport, $id){
        $rs = $this->repository->where('id', $id)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $data = $formSupport->data(\App\Forms\Admin\PermissionProfileForm::class);

        $rs->permissions()->sync($data['permissions']);

        return redirect()->route('admin.roles.show', $id)->with('success', 'Permissões vinculadas com sucesso');
    }
}
