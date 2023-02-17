<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Support\FormSupport;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    public function __construct(private Plan $repository)
    {
        //
    }

    public function index(string $url, FormSupport $formSupport)
    {
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $rs->profiles = $rs->profiles->pluck('id')->toArray();
        $form = $formSupport->run(\App\Forms\Admin\PlanProfileForm::class, route('admin.plans.profiles.store', $url), $rs);

        $title = $rs->name;
        $details = $rs->profiles()->get();
        return view('admin.plans.profiles.index', compact('details', 'form', 'url', 'title'));
    }



    public function update(string $url, FormSupport $formSupport)
    {
        $rs = $this->repository->where('url', $url)->first();
        if (!$rs) {
            return redirect()->back();
        }

        $data = $formSupport->data(\App\Forms\Admin\PlanProfileForm::class);

        $rs->profiles()->sync($data['profiles']);

        return redirect()->route('admin.plans.show', $url)->with('success', 'Perfis vinculados com sucesso');
    }
}
