<?php

namespace App\Http\Controllers\Admin;

use App\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVisitantesRequest;
use App\Http\Requests\Admin\UpdateVisitantesRequest;

class VisitantesController extends Controller
{
    /**
     * Display a listing of Visitante.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('visitante_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('visitante_delete')) {
                return abort(401);
            }
            $visitantes = Visitante::onlyTrashed()->get();
        } else {
            $visitantes = Visitante::all();
        }

        return view('admin.visitantes.index', compact('visitantes'));
    }

    /**
     * Show the form for creating new Visitante.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('visitante_create')) {
            return abort(401);
        }
        return view('admin.visitantes.create');
    }

    /**
     * Store a newly created Visitante in storage.
     *
     * @param  \App\Http\Requests\StoreVisitantesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisitantesRequest $request)
    {
        if (! Gate::allows('visitante_create')) {
            return abort(401);
        }
        $visitante = Visitante::create($request->all());



        return redirect()->route('admin.visitantes.index');
    }


    /**
     * Show the form for editing Visitante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('visitante_edit')) {
            return abort(401);
        }
        $visitante = Visitante::findOrFail($id);

        return view('admin.visitantes.edit', compact('visitante'));
    }

    /**
     * Update Visitante in storage.
     *
     * @param  \App\Http\Requests\UpdateVisitantesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisitantesRequest $request, $id)
    {
        if (! Gate::allows('visitante_edit')) {
            return abort(401);
        }
        $visitante = Visitante::findOrFail($id);
        $visitante->update($request->all());



        return redirect()->route('admin.visitantes.index');
    }


    /**
     * Display Visitante.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('visitante_view')) {
            return abort(401);
        }
        $visitante = Visitante::findOrFail($id);

        return view('admin.visitantes.show', compact('visitante'));
    }


    /**
     * Remove Visitante from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('visitante_delete')) {
            return abort(401);
        }
        $visitante = Visitante::findOrFail($id);
        $visitante->delete();

        return redirect()->route('admin.visitantes.index');
    }

    /**
     * Delete all selected Visitante at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('visitante_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Visitante::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Visitante from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('visitante_delete')) {
            return abort(401);
        }
        $visitante = Visitante::onlyTrashed()->findOrFail($id);
        $visitante->restore();

        return redirect()->route('admin.visitantes.index');
    }

    /**
     * Permanently delete Visitante from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('visitante_delete')) {
            return abort(401);
        }
        $visitante = Visitante::onlyTrashed()->findOrFail($id);
        $visitante->forceDelete();

        return redirect()->route('admin.visitantes.index');
    }
}
