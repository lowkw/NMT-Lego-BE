<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelegoSetRequest;
use App\Http\Requests\UpdatelegoSetRequest;
use App\Models\legoSet;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\themes;

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
    public function index(Request $request)
    {
        $user = auth()->user() ?? null;
        $query = legoSet::query();
        $sortBy = "DESC";

        //Filter date by "created_at"
        $getSortBy = $request->input('sortBy');
        if ($getSortBy == "OLD"){
            $sortBy = "ASC";
        }

        // If none of the filters are applied, return all records
        if (
            !$request->has('keywords')  &&
            !$request->has('theme')  &&
            !$request->has('year')  &&
            !$request->has('fromParts') &&
            !$request->has('toParts')
        ){
            $legoSets = legoSet::query()->orderBy('created_at', $sortBy)->paginate(12);
        }else {
            //Filter Keywords
            if ($request->has('keywords') && $request->input('keywords') !== "") {
                $query->where('name', 'like', '%' . $request->input('keywords') . '%');
            }
            //Filter Theme
            if ($request->has('theme') && $request->input('theme') !== "0") {
                $query->where('theme_id', '=', $request->input('theme'));
            }
            //Filter Year
            if ($request->has('year') && $request->input('year') !== "0") {
                $query->where('year', '=', $request->input('year'));
            }
            //Filter Number of parts
            if ($request->input('fromParts') !== "0" && $request->input('toParts') !== "0") {
                $minNumParts = $request->input('fromParts');
                $maxNumParts = $request->input('toParts');
                $query->whereBetween('num_parts', [$minNumParts, $maxNumParts])->get();
            }
            $legoSets = $query->orderBy('created_at', $sortBy)->paginate(12);
        }

        $userWishlists = collect();
        if (!$user == null) {
            $userWishlists = Wishlist::where('user_id', '=', $user->id)->get();
        }

        //Get all themes
        $themeList = themes::all()->sortBy('name');
        //Get all years
        $yearList = legoSet::select('year')->orderBy('year',"DESC")->distinct()->get();
        return view('legoSets.index', compact(['legoSets', 'userWishlists','themeList','yearList']));
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
     * Delete set from Wishlist.
     */
    public function deleteWishlist(legoSet $set, Request $request)
    {
        $wishlistID = $request->oneWishlist;
        $wishlist = Wishlist::find($wishlistID);

        if (Wishlist::find($wishlistID)->sets()->where('lego_set_id', $set->id)->doesntExist()) {
            return redirect()->route('wishlist.show', compact('wishlist'))
                ->with('error', "'$set->name' is not in your wishlist.");
        }

        Wishlist::find($wishlistID)->sets()->detach($set->id);

        return redirect()->route('wishlist.show', compact('wishlist'))
            ->with('success', "Deleted '$set->name' from your wishlist successfully.");
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
    public function addWishlist(legoSet $set, Request $request)
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

    public function removeCollection(legoSet $set)
    {
        $user = auth()->user();

        $collection = $user->with('collection')->find($user->id);

        if (!$set->collections->contains($collection->id)) {
            return redirect()->route('legoCollection.index'(['set']))
                ->with('error', "'$set->name' is not in your collection.");
        }
        $set->collections()->detach($collection->id);
        return redirect()->route('legoCollection.index')
            ->with('success', "Removed '$set->name' from your collection successfully.");
    }
}
