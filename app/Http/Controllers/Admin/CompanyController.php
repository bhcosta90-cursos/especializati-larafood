<?php

namespace App\Http\Controllers\Admin;

use App\Company\ManagerCompany;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Support\FormSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct(private Company $repository)
    {
        $this->middleware('can:companies');
    }

    public function index(Request $request)
    {
        $profiles = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.companies.index', compact('profiles'));
    }

    public function edit(FormSupport $formSupport, string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\CompanyForm::class, route('admin.companies.update', $rs->id), $rs);
        return view('admin.companies.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $id)
    {
        $data = $formSupport->data(\App\Forms\Admin\CompanyForm::class);

        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }

        if (!empty($data['logo'])) {
            if ($rs->logo && Storage::exists($rs->logo)) {
                Storage::delete($rs->logo);
            }
            $data['logo'] = $data['logo']->store('companies/' . app(ManagerCompany::class)->getCompanyIdentify() . '/companies');
        } else {
            unset($data['logo']);
        }

        $rs->update($data);
        return redirect()->route('admin.companies.index')->with('success', 'Empresa editada com sucesso');
    }

    public function show(string $id)
    {
        $rs = $this->repository->find($id);
        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.companies.show', compact('rs'));
    }

    public function destroy(string $id)
    {
        $rs = $this->repository->find($id);

        if (!$rs) {
            return redirect()->back();
        }

        if ($rs->logo && Storage::exists($rs->logo)) {
            Storage::delete($rs->logo);
        }
        $rs->delete();

        return redirect()->route('admin.companies.index')->with('warning', 'Empresa deletada com sucesso');
    }
}
