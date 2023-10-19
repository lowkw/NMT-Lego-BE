<x-guest-layout>

    <section class="title-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                    <h1 class="page-title" style="color:white;">Items in {{ Auth::user()->name }}'s Collection</h1>
                </div>
            </div>
        </div>
    </section>

    <!--User Collection -->

    <div class="container pt-5">
        <div class="row justify-content-md-center">

            <!--Collection Sets-->
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
                            <div class="flex space-x-4 justify-center align-items-center mt-4">
                                <div class="py-2">
                                    <a role="button" href="{{ route('sets.show', compact('set')) }}" class="btn btn-primary btn-sm">View Set -&gt;</a>
                                </div>
                                <form action="{{ route('set.removeCollection', compact('set')) }}" method="post">
                                    @csrf
                                    <button type="submit" role="button" class="btn btn-danger btn-sm">
                                        Remove <i class="fa fa-solid fa-square-minus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!--Pagination-->
            <div class="col-12 col-md-12"></div>
            <div class="col text-center">
                <nav aria-label="Page navigation example">
                    <div class="p-6">
                        {{ $userlegoSets->links() }}
                    </div>
                </nav>
            </div>

        </div>
    </div>

    <!--End Collection -->

</x-guest-layout>
