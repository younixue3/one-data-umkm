<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Agenda\StoreAgendaRequest;
use App\Http\Requests\Agenda\UpdateAgendaRequest;
use App\Models\Agenda;
use App\Services\AgendaServices;

class AgendaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(AgendaServices $agendaServices)
    {
        return view("Front.agenda");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Agenda/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgendaRequest $request, AgendaServices $agendaServices)
    {
        $agendaServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $agenda, AgendaServices $agendaServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $agenda = $agendaServices->show($agenda);
        return inertia("Agenda/Edit", compact("agenda"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgendaRequest $request, AgendaServices $agendaServices): void
    {
        $agendaServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agenda $agenda, AgendaServices $agendaServices)
    {
        $agendaServices->destroy($agenda);
    }
}
