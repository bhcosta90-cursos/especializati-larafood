<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private User $repository)
    {
        //
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->byCompany()->latest()->paginate();
        return view('admin.users.index', compact('profiles'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\UserForm::class, route('admin.users.store'));
        return view('admin.users.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\UserForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['email' => $data['email']], $data + [
            'password' => bcrypt($data['password']),
            'company_id' => auth()->user()->company_id,
        ]);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuário cadastrado com sucesso');
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->byCompany()->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\UserForm::class, route('admin.users.update', $rs->id), $rs);
        return view('admin.users.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\UserForm::class);

        $rs = $this->repository->byCompany()->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.users.index')->with('success', 'Usuário editado com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->byCompany()->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.users.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->byCompany()->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        $rs->delete();

        return redirect()->route('admin.users.index')->with('warning', 'Usuário deletado com sucesso');
    }
}
