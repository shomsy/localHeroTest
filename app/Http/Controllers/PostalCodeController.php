<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use App\Http\Requests\StorePostalCodeRequest;
use App\Http\Requests\UpdatePostalCodeRequest;
use App\Models\SalesGuy;
use App\Services\PostalCodeConflictValidator;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class PostalCodeController extends Controller
{
    /**
     * PostalCodeController constructor.
     *
     * @param  \App\Http\Controllers\PostalGuyConflictValidator  $validator
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(): Collection
    {
        $salesGuy = SalesGuy::factory()
            ->count(1)
            ->hasCodes(3)
            ->create();

        $newSalesGuy = SalesGuy::with('codes')->find($salesGuy->first()->id);
//        dd($newSalesGuy->codes());

        $newSalesGuy->codes()->create(['code' => rand(100,900) . '*']);


//        $salesGuy = SalesGuy::with('codes')->first();
        $codes = $newSalesGuy->codes;
        $allPostCodes = PostalCode::get();

        return (new PostalCodeConflictValidator($allPostCodes))->validate($codes);
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
     * @param  \App\Http\Requests\StorePostalCodeRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostalCodeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostalCode  $postalCode
     *
     * @return \Illuminate\Http\Response
     */
    public function show(PostalCode $postalCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostalCode  $postalCode
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(PostalCode $postalCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostalCodeRequest  $request
     * @param  \App\Models\PostalCode  $postalCode
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostalCodeRequest $request, PostalCode $postalCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostalCode  $postalCode
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostalCode $postalCode)
    {
        //
    }
}
