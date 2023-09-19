<x-guest-layout>
<section class="title-banner p-0" style="background-image: url({{$set->set_img_url}});">
    <div class="background-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                    <h1 class="page-title" style="color:white;">{{$set->name}}</h1>            </div>
            </div>
        </div>
    </div>
</section>
<div class="container d-flex gap-5 pt-5 flex-column flex-lg-row pb-5">
    <img class="img-fluid col-12 col-lg-6 rounded-4" src="{{$set->set_img_url}}" alt="{{$set->name}}">
    <div class="details p-2 col-12 col-lg-6">
        <p>Theme: {{$set->theme->name}}</p>
        <p>Year: {{$set->year}}</p>
        @if($set->num_parts)
        <p>Number of parts: {{$set->num_parts}}</p>
        @endif
        <hr class="w-50">

        <button id="btnAddtoWishlist" class="px-3 py-1 rounded text-white show-modalss" onclick="tailwindModalToggle()">
            <i class="fa-solid fa-heart-circle-plus" style="color: #159bce;font-size: 3rem;"></i>
        </button>
        <div id="loading" class="pt-5" style="display: none;">
            <!-- Add your loading spinner or loading message here -->
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            &emsp; Submitting . . . .
        </div>
    </div>
</div>
    <div class="container pt-5">
        <h2>Related Sets</h2>
        <div class="row justify-content-md-center">

            <!--Sets-->
            @foreach($relatedSets as $legoSet)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div style="">
                            <img src="{{ $legoSet->set_img_url }}" class="lego-set-img mx-auto d-block object-fit-cover w-100" alt="{{ $set->name }}" height="300px">
                        </div>
                        <div class="card-body">
                            <p class="card-text">

                            </p><h3 class="text-center">{{ $legoSet->name }}</h3>
                            <p class="text-center">{{ $legoSet->set_num }} | {{ $legoSet->theme->name }}</p>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a role="button" href="{{ route('sets.show', ['set'=>'legoSet']) }}" class="btn btn-primary btn-sm">View Set -&gt;</a>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--End Sets-->

            <!--Modal-->
            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" style="background: rgba(128, 128, 128, 0.7);">
                <div class="relative w-full max-h-full" style="padding-left: 25%; padding-right: 25%; padding-top:5%;">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 mt-5">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Wish List
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="defaultModal" onclick="closeTailwindModalToggle()">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="row justify-content-md-center">

                            @foreach($userWishlist as $wishlist)
                                <div class="col-10 col-sm-6 col-lg-4 mb-4">
                                    <form action="{{ route('sets.store') }}" class="my-formss flex flex-col gap-4 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg
                                                                         text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" method="post">
                                        @csrf
                                        <p>
                                            <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}"/>
                                            <input type="hidden" name="set_id" value="{{ $set->id }}"/>
                                            <button type="submit" class="btnSubmitss text-white mt-2 ml-5 justify-content-center" onclick="showLoading()">{{ $wishlist->name }}</button>
                                        </p>
                                    </form>

                                </div>
                            @endforeach
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center justify-content-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="defaultModal" type="button" class="p-2 text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="closeTailwindModalToggle()">Cancel</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Modal-->


        </div>
    </div>

</x-guest-layout>
