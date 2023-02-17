<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    public function __construct(private Profile $repository)
    {
        //
    }

    public function index(string $id, FormSupport $formSupport)
    {
        $rs = $this->repository->where('id', $id)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $rs->permissions = $rs->permissions->pluck('id')->toArray();
        $form = $formSupport->run(\App\Forms\Admin\PermissionProfileForm::class, route('admin.profiles.permissions.store', $id), $rs);

        $title = $rs->name;
        $details = $rs->permissions()->get();
        return view('admin.profiles.permissions.index', compact('details', 'form', 'id', 'title'));
    }

    public function update(string $id, FormSupport $formSupport){
        $rs = $this->repository->where('id', $id)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $data = $formSupport->data(\App\Forms\Admin\PermissionProfileForm::class);

        $rs->permissions()->sync($data['permissions']);

        return redirect()->route('admin.profiles.show', $id)->with('success', 'Permissões vinculadas com sucesso');

    }
}
