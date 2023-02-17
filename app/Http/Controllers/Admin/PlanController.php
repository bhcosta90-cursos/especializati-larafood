<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct(private Plan $repository)
    {
        //
    }

    public function index(Request $request)
    {
        $plans = $this->repository->search($request->all())->latest()->paginate();
        return view('admin.plans.index', compact('plans'));
    }

    public function create(FormSupport $formSupport)
    {
        $form = $formSupport->run(\App\Forms\Admin\PlanForm::class, route('admin.plans.store'));
        return view('admin.plans.create', compact('form'));
    }

    public function store(FormSupport $formSupport)
    {
        $data = $formSupport->data(\App\Forms\Admin\PlanForm::class);

        $obj = $this->repository->withTrashed()->firstOrCreate(['name' => $data['name']], $data);
        if ($obj->wasRecentlyCreated === false) {
            $obj->restore();
            $obj->update($data);
        }

        return redirect()->route('admin.plans.index')->with('success', 'Plano cadastrado com sucesso');
    }

    public function edit(FormSupport $formSupport, string $url)
    {
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $form = $formSupport->run(\App\Forms\Admin\PlanForm::class, route('admin.plans.update', $rs->url), $rs);
        return view('admin.plans.edit', compact('form'));
    }

    public function update(FormSupport $formSupport, string $url)
    {
        $data = $formSupport->data(\App\Forms\Admin\PlanForm::class);

        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $rs->update($data);
        return redirect()->route('admin.plans.index')->with('success', 'Plano editado com sucesso');
    }

    public function show(string $url)
    {
        $rs = $this->repository
            ->with('details')
            ->where('url', $url)
            ->first();

        if (!$rs) {
            return redirect()->back();
        }
        return view('admin.plans.show', compact('rs'));
    }

    public function destroy(string $url)
    {
        $rs = $this->repository->with('details')->where('url', $url)->first();

        if (!$rs) {
            return redirect()->back();
        }

        if($rs->details->count()){
            return redirect()->back()->with('error', 'Existem detalhes nesse plano, portanto não pode deletar');
        }

        $rs->delete();

        return redirect()->route('admin.plans.index')->with('warning', 'Plano deletado com sucesso');
    }
}
