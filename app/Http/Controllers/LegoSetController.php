<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelegoSetRequest;
use App\Http\Requests\UpdatelegoSetRequest;
use App\Models\legoSet;
use App\Models\Wishlist;
use Illuminate\Http\Request;

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
        //return view('welcome');
        $user = auth()->user() ?? null;
        $legoSets = legoSet::orderBy('id', 'DESC')->paginate(12);
        $userWishlists = collect();
        if (!$user == null) {
            $userWishlists = Wishlist::where('user_id', '=', $user->id)->get();
        }
        return view('legoSets.index', compact(['legoSets', 'userWishlists']));
        //
        //return view('legoSets.lego-set');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\legoSet $legoSet
     */
    public function show(legoSet $set)
    {
        $relatedSets = legoSet::where('theme_id', '=', $set->theme_id)
            ->where('id', '!=', $set->id) // So you won't fetch same post
            ->inRandomOrder()->paginate(3);
        $user = auth()->user() ?? null;
        $userWishlists = collect();
        if (!$user == null) {
            $userWishlists = Wishlist::where('user_id', '=', $user->id)->get();
        }

        return view('legoSets.show', compact(['set', 'relatedSets', 'userWishlists']));
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
    public function store(Request $request)
    {
        $user = auth()->user();
        $wishlistId = $request->input('wishlist_id');
        $legoSetId = $request->input('set_id');
        $legoSet = LegoSet::find($legoSetId);

        $relatedSets = legoSet::where('theme_id', '=', $legoSet->theme_id)
            ->where('id', '!=', $legoSet->id) // So you won't fetch same post
            ->inRandomOrder()->paginate(3);
        $wishlist = Wishlist::find($wishlistId);

        $set = $legoSet;
        if ($legoSet)
        {
            $existsInPivot = $wishlist->sets()->where('lego_set_id', $legoSetId)->exists();

            if (!$existsInPivot) {
                // If it doesn't exist, attach the record
                $wishlist->sets()->attach($legoSet->id, ['created_at' => now(), 'updated_at' => now()]);

                return redirect()->route('sets.show', compact('set','relatedSets'))
                    ->with('success', "Lego set '{$legoSet->name}' added to wishlist '{$wishlist->name}' successfully.");
            } else {
                // If it already exists, return a message to the user
                return redirect()->route('sets.show',compact('set','relatedSets'))
                    ->with('warning', "Lego set '{$legoSet->name}' is already in wishlist '{$wishlist->name}'.");
            }
            //$wishlist->sets()->attach($legoSet->id, ['created_at' => now(), 'updated_at' => now()]);
        }
        return redirect()->route('sets.show',compact('set','relatedSets'))
            ->with('warning', "Lego set not added to '$wishlist->name'.");
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

    /**
     * Add set to collection.
     */
    public function add(legoSet $set)
    {
        $user = auth()->user();
        $collection = $user->with('collection')->find($user->id);
        $relatedSets = legoSet::where('theme_id', '=', $set->theme_id)
            ->where('id', '!=', $set->id) // So you won't fetch same post
            ->inRandomOrder()->paginate(3);
        if ($set->collections->contains($collection->id)) {
            return redirect()->route('sets.show', compact(['set', 'relatedSets']))
                ->with('error', "'$set->name' is already in your collection.");
        }
        $set->collections()->attach($collection->id);
        return redirect()->route('sets.show', compact(['set', 'relatedSets']))
            ->with('success', "Added '$set->name' to your collection successfully.");
    }

    /**
     * Add set to Wishlist.
     */
    public function addWishtlist(legoSet $set, Request $request)
    {
        $relatedSets = legoSet::where('theme_id', '=', $set->theme_id)
            ->where('id', '!=', $set->id) // So you won't fetch same post
            ->inRandomOrder()->paginate(3);

        $wishlistID = $request->oneWishlist;

        if (Wishlist::find($wishlistID)->sets()->where('lego_set_id', $set->id)->exists()) {
            return redirect()->route('sets.show', compact(['set', 'relatedSets']))
                ->with('error', "'$set->name' is already in your wishlist.");
        }

        Wishlist::find($wishlistID)->sets()->attach($set->id);

        return redirect()->route('sets.show', compact(['set', 'relatedSets']))
            ->with('success', "Added '$set->name' to your wishlist successfully.");
    }
}
