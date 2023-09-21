<x-guest-layout>
<section class="title-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                <h1 class="page-title" style="color:white;">Sets</h1>            </div>
        </div>
    </div>
</section>
<div class="container pt-4">
    <div class="row row-cols-2 row-cols-lg-3">
        <!--Theme-->
        <div class="col-4 col-lg-2">
            Theme
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02">
                    <option>Star Wars</option>
                    <option>Harry Potter</option>
                    <option>Marvel</option>
                    <option>Warner Bros</option>
                </select>

            </div>
        </div>
        <!--End Theme-->

        <!--Year-->
        <div class="col-4 col-lg-1">
            Year
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02">
                    <option selected="">Year</option>
                    <option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option>
                </select>
            </div>
        </div>
        <!--End Year-->

        <!--Range Slider-->
        <div class="col-4 col-lg-3">
            Number of parts
            <div class="range_container">
                <div class="sliders_control">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <input id="fromSlider" type="range" value="100" min="0" max="700">
                            <input id="toSlider" type="range" value="300" min="0" max="700" style="background: linear-gradient(to right, rgb(198, 198, 198) 0%, rgb(198, 198, 198) 14.2857%, rgb(37, 218, 165) 14.2857%, rgb(37, 218, 165) 42.8571%, rgb(198, 198, 198) 42.8571%, rgb(198, 198, 198) 100%); z-index: 0;">
                        </div>
                        <div class="col-4 col-lg-6">
                            <input class="form_control_container__time__input" type="number" id="fromInput" value="100" min="0" max="700">
                        </div>
                        <div class="col-4 col-lg-3"></div>
                        <div class="col-4 col-lg-3">
                            <input class="form_control_container__time__input" type="number" id="toInput" value="300" min="0" max="700">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--End Range Slider-->

        <!--Sort by-->
        <div class="col-4 col-lg-2">
            Sort by
            <div class="input-group mb-3">
                <select class="form-select" id="inputGroupSelect02">
                    <option>Most recent</option>
                    <option>Oldest</option>
                    <option>Accending</option>
                    <option>Decending</option>
                </select>
            </div>
        </div>
        <!--End Sort by-->

        <!--Search -->
        <div class="col-4 col-lg-2">
            <form class="" method="post" action="">
                @csrf
                <div class="input-group mb-3">
                    Search
                    <input type="text" class="for" name="keyWords" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <!--<button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>-->
                </div>
            </form>
        </div>
        <!--End Search -->

    </div>
</div>

<!---------Sets list----------->

    <div class="container">
        <div class="row justify-content-md-center">
                <!--Sets-->
            @foreach($legoSets as $set)
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
                                <form action="{{ route('set.add', compact('set')) }}" method="post">
                                    @csrf
                                    <button data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to your Collection" type="submit">
                                        <i class="add-icon fa-solid fa-plus"></i>
                                    </button>
                                </form>
                                <button id="btnAddtoWishlist" class="rounded text-white show-modalss" onclick="tailwindModalToggle({{ $set->id }})"
                                     data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to a Wishlist">
                                    <i class="fa-solid fa-heart-circle-plus" style="color: #159bce;font-size: 3rem;"></i>
                                </button>
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
                        {{ $legoSets->onEachSide(0)->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full" style="background: rgba(128, 128, 128, 0.7);">
                <div class="relative w-full max-h-full" style="padding-top:5%;">
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
                            <div class="row justify-content-center">

                            @foreach($userWishlists as $wishlist)
                                <div class="col-10 col-sm-6 col-lg-4 mb-4">
                                    <form action="{{ route('sets.store') }}" class="w-100" method="post">
                                        @csrf
                                        <p>
                                            <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}"/>
                                            <input type="hidden" name="set_id" value="{{ $set->id }}"/>
                                            <button type="submit" class="btn btn-primary w-100 text-white p-4 justify-content-center" onclick="showLoading()">{{ $wishlist->name }}</button>
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
<!---------End Sets list----------->
</x-guest-layout>
