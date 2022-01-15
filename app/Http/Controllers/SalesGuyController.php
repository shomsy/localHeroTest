<?php

namespace App\Http\Controllers;

use App\Models\SalesGuy;
use App\Http\Requests\StoreSalesGuyRequest;
use App\Http\Requests\UpdateSalesGuyRequest;

class SalesGuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesGuyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesGuyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesGuy  $salesGuy
     * @return \Illuminate\Http\Response
     */
    public function show(SalesGuy $salesGuy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesGuy  $salesGuy
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesGuy $salesGuy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesGuyRequest  $request
     * @param  \App\Models\SalesGuy  $salesGuy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesGuyRequest $request, SalesGuy $salesGuy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesGuy  $salesGuy
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesGuy $salesGuy)
    {
        //
    }
}
