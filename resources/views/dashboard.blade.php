<x-guest-layout>
<section class="title-banner">

    </section>
    <div class="container pt-5" >
        <div class="pb-12">
            <div class="row max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="col-sm-4 job-profile-img">
                    @if (Auth::user()->avatar)
                        <img class="img-fluid rounded-circle" src="/avatars/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}">
                    @else
                        <img class="img-fluid rounded-circle" src="{{ asset('/images/default-profile-image.jpg') }}" alt="{{Auth::user()->name}}">
                    @endif
                </div>
                <div class="col-sm-8">
                    <h1 class="profile-name">{{Auth::user()->name}}</h1>
                    <p>{{Auth::user()->bio}}</p>
                </div>
            </div>
        </div>
    </div>
    @if ($userlegoSets)
        <!---------Sets list----------->
        <div class="container p-5">
            <h2 class="my-5">Latest Sets Added to Collection</h2>
            <div class="row">
                <!--Sets-->
                @foreach($userlegoSets as $set)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <div style="">
                                <img src="{{ $set->set_img_url }}" class="lego-set-img mx-auto d-block object-fit-cover w-100" alt="{{ $set->name }}" height="300px">
                            </div>
                            <div class="card-body">
                                <p class="card-text">

                                </p><h3 class="text-center">{{ $set->name }}</h3>
                                <p class="text-center">{{ $set->set_num }} | {{ $set->theme->name }}</p>

                                <!--Buttons-->
                                <div class="flex space-x-4 justify-center mt-4">
                                    <div class="py-2">
                                        <a role="button" href="{{ route('sets.show', compact('set')) }}" class="btn btn-primary btn-sm m-0">View Set -&gt;</a>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--End Sets-->
            </div>
        </div>
        <!---------End Sets list----------->
    @endif
    @if ($userWishlists)
        <!---------Wishlist list----------->
        <div class="container p-5">
            <div class="row justify-content-sm-between">
                <div class="col-sm-10">
                    <h2 class="my-5">My Wishlists</h2>
                </div>
                <div class="col-sm-2">
                    <a role="button" href="{{ route('wishlist.create') }}" class="btn btn-primary btn-sm m-0 my-5">Create New Wishlist</a>
                </div>
            </div>
            <div class="row">
                <!--wishlists-->
                @foreach($userWishlists as $wishlist)
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center">{{ $wishlist->name }}</h3>
                                <p class="text-center">Status: {{ $wishlist->public == true ? "Public" : "Private"  }}</p>

                                <!--Buttons-->
                                <div class="flex space-x-4 justify-center mt-4">
                                    <div class="py-2">
                                        <a role="button" href="{{ route('wishlist.edit', compact('wishlist')) }}" class="btn btn-primary btn-sm m-0">Edit</a>
                                        <a role="button" href="{{ route('wishlist.show', compact('wishlist')) }}" class="btn btn-primary btn-sm m-0">View Wishlist -&gt;</a>
                                    </div>
                                </div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--End wishlists-->
            </div>
        </div>
        <!---------End Wishlist list----------->
    @endif
</x-guest-layout>
