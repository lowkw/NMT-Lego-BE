<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::query()->paginate(10);
        return view('wishlist.index', compact(['wishlists']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if(isset($request['public'])) {
            $request['public'] = true;
        } else {
            $request['public'] = false;
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'public' => 'boolean'
        ]);

        $wishlist = Wishlist::create([
            'name' => $validated['name'],
            'user_id' => $user->id,
            'public' => $validated['public'],
        ]);

        return redirect()->route('dashboard')
            ->with('success', "Wishlist '$wishlist->name' created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        $user = auth()->user();

        $userWishlist = Wishlist::where('user_id', $user->id)->where('id',$wishlist->getKey())->with('sets')->first();
        $userlegoSets = $userWishlist->sets()->orderBy('id', 'DESC')->paginate(12);;
        return view('wishlist.show', compact(['wishlist','userlegoSets']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {

        //$wishlist = Wishlist::query()->find($id);
        //$legoCollection = Wishlist::with('sets')->first();

        //$userlegoSets = $legoCollection->sets()->orderBy('id', 'DESC')->paginate(12);;

        return view('wishlist.edit', compact(['wishlist']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {

        // Use the update method to update the model and save it to the database
        //wishlist->update($validatedData);
        if(isset($request['public'])) {
            $request['public'] = true;
        } else {
            $request['public'] = false;
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'public' => 'boolean'
        ]);

        $wishlist->update([
            'name' => $validated['name'],
            'public' => $validated['public'],
        ]);

        return redirect()->route('wishlist.index')
            ->with('success', $wishlist->name.' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Author deleted successfully.');
    }
}
