<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Facades\Auth;


class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $legoCollection = Collection::where('user_id', $user->id)->with('sets')->first();

        $userlegoSets = $legoCollection->sets()->orderBy('id', 'DESC')->paginate(12);;

        return view('legoCollection.index', compact('userlegoSets'));
    }



}
