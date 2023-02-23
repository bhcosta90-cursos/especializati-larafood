<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    public function __construct(private Plan $repository)
    {
        $this->middleware('can:plans');
    }

    public function index(string $url, FormSupport $formSupport)
    {
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $details = $rs->details()->get();
        $form = $formSupport->run(\App\Forms\Admin\DetailPlanForm::class, route('admin.plans.details.store', $url));
        $title = $rs->name;
        return view('admin.plans.details.index', compact('details', 'form', 'url', 'title'));
    }

    public function store(string $url, FormSupport $formSupport){
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $data = $formSupport->data(\App\Forms\Admin\DetailPlanForm::class);
        $rs->details()->create($data);

        return redirect()->back()->with('success', 'Detalhe do plano cadastrado com sucesso');
    }

    public function destroy(string $url, string $id){
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $detail = $rs->details()->where('id', $id)->first();
        if (!$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()->back()->with('warning', 'Detalhe do plano deletado com sucesso');
    }
}
