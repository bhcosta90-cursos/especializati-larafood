<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(private Profile $repository)
    {
        $this->middleware('can:profiles');
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.profiles.index', compact('profiles'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\ProfileForm::class, route('admin.profiles.store'));
        return view('admin.profiles.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\ProfileForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['name' => $data['name']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.profiles.index')->with('success', 'Perfil cadastrado com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\ProfileForm::class, route('admin.profiles.update', $rs->id), $rs);
        return view('admin.profiles.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\ProfileForm::class);

        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.profiles.index')->with('success', 'Perfil editado com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.profiles.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        $rs->delete();

        return redirect()->route('admin.profiles.index')->with('warning', 'Perfil deletado com sucesso');
    }
}
