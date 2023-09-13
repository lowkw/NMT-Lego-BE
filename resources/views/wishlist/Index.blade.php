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
        <div class="row row-cols-auto justify-content-md-center">
                <!--Sets-->
            @foreach($wishlists as $wishlist)
                <div class="col" style="padding:1%;">
                    <div class="card" style="width: 25rem;">
                        <div class="card-body">
                            <p class="card-text">

                            </p><h3 class="text-center">{{ $wishlist->name }}</h3>
                            <p class="text-center">Status: {{ $wishlist->public == true ? "Public" : "Private"  }}</p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a href="{{ route('wishlist.edit', compact('wishlist')) }}"><button class="btn btn-primary"  type="submit">
                                    <i class="fa fa-eye"></i>
                                    Edit
                                </button></a>
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
        </div>
    </div>
<!---------End Sets list----------->

</x-guest-layout>
