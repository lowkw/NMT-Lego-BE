<x-guest-layout>
<section class="title-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                <h1 class="page-title" style="color:white;">Wishlist</h1>            </div>
        </div>
    </div>
</section>
<div class="container pt-4">
    <div class="row row-cols-2 row-cols-lg-3">


    </div>
</div>

<!---------Sets list----------->

    <div class="container">
        <div class="row justify-content-md-center">
            @if($wishlists->isEmpty())
            <p class="text-center">You have no wishlists yet.</p>
            <a role="button" href="{{ route('wishlist.create') }}" class="btn btn-primary w-50 m-0">Create a wishlist</a>
            @else
                <!--Sets-->
            @foreach($wishlists as $wishlist)
                <div class="col" style="padding:1%;">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <p class="card-text">

                            </p><h3 class="text-center">{{ $wishlist->name }}</h3>
                            <p class="text-center">Status: {{ $wishlist->public == true ? "Public" : "Private"  }}</p>
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
                <!--End Sets-->


            <!--Pagination-->
            <div class="col-12 col-md-12"></div>
            <div class="col text-center">
                <nav aria-label="Page navigation example">
                    <div class="p-6">

                    </div>
                </nav>
            </div>
            @endif
        </div>
    </div>
<!---------End Sets list----------->
    

</x-guest-layout>
