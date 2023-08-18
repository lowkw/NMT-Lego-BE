<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelegoSetRequest;
use App\Http\Requests\UpdatelegoSetRequest;
use App\Models\legoSet;

class LegoSetController extends Controller
{
    /**
     * Add the permissions during object instantiation.
     *
     */
    function __construct()
    {
        // TODO: Need to create a suitable "not authorised" JSON response.
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('welcome');
        $legoSets = legoSet::paginate(20);
        return view('legoSets.index', compact(['legoSets',]));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\legoSet  $legoSet
     */
    public function show(legoSet $legoSet)
    {
        return view('legoSets.show', compact(['legoSet',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelegoSetRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(legoSet $legoSet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelegoSetRequest $request, legoSet $legoSet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(legoSet $legoSet)
    {
        //
    }
}
