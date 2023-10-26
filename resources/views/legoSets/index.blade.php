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
    <form class="" method="get" action="{{ route('sets.index', ['keywords' => request('keywords'), 'sortBy' => request('sortBy')]) }}">
        @csrf
    <div class="row row-cols-2 row-cols-lg-3 pb-6">

        <!--Theme-->
        <div class="col-4 col-lg-2">
            <b>Theme</b>
            <div class="input-group mb-3">
                <select class="form-select" id="legoTheme" name="theme">
                    <option value="0">Select theme</option>
                    @foreach($themeList as $theme)
                        <option value="{{$theme->id}}" {{ old('theme', request('theme')) == $theme->id ? 'selected' : '' }}>{{$theme->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--End Theme-->

        <!--Year-->
        <div class="col-4 col-lg-1">
            <b>Year</b>
            <div class="input-group mb-3">
                <select class="form-select" id="legoYear" name="year">
                    <option value="0">Year</option>
                    @foreach($yearList as $year)
                        <option value="{{$year->year}}" {{ old('year', request('year')) == $year->year ? 'selected' : '' }}>{{$year->year}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!--End Year-->

        <!--Range Slider-->
        <div class="col-4 col-lg-3">
            <b>Number of parts</b>
            <div class="range_container mt-2 mb-0">
                <div class="sliders_control">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <input id="fromSlider" type="range" value="{{ old('fromParts',request('fromParts')) !== null ? old('fromParts', request('fromParts')) : '0' }}" min="0" max="2000">
                            <input class="to-slider" id="toSlider" type="range" value="{{ old('toParts', request('toParts')) !== null ? old('toParts', request('toParts')) : '0' }}" min="0" max="2000">
                        </div>
                        <div class="col-4 col-lg-6 mt-2">
                            <input class="form_control_container__time__input" name="fromParts" type="number" id="fromInput" value="{{ old('fromParts', request('fromParts')) !== null ? old('fromParts', request('fromParts')) : '0' }}" min="0" max="2000">
                        </div>
                        <div class="col-4 col-lg-3"></div>
                        <div class="col-4 col-lg-3 mt-2">
                            <input class="form_control_container__time__input" name="toParts" type="number" id="toInput" value="{{ old('toParts', request('toParts')) !== null ? old('toParts', request('toParts')) : '0' }}" min="0" max="2000">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--End Range Slider-->

            <!--Sort by-->
            <div class="col-4 col-lg-2">
                <b>Sort by</b>
                <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect02" name="sortBy">
                        <option value="MSR">Most recent</option>
                        <option value="OLD">Oldest</option>
                        <!--<option value="ASC">Accending</option>
                        <option value="DSC">Decending</option>-->
                    </select>
                </div>
            </div>
            <!--End Sort by-->

            <!--Search -->
            <div class="col-4 col-lg-2">
                <b>Keywords</b>
                    <div class="input-group">
                        <input type="text" class="for w-full h-10 px-3 text-base placeholder-gray-600 border rounded-lg focus:shadow-outline"
                               name="keywords" placeholder="search keywords" id="keywords"
                               value="{{ old('keywords', request('keywords'))}}"
                               aria-label="Recipient's username"
                               aria-describedby="button-addon2">
                    </div>
            </div>
            <!--End Search -->
        <!--Search -->
        <div class="col-4 col-lg-2">
            <div class="input-group mt-4">
                <button type="button" class="w-full h-10 px-6 text-blue-100 transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800"
                        id="button-addon2" onclick="clearAllSearchInput()">
                    <i class="fa-solid fa-eraser"></i>&emsp;Clear
                </button>
            </div>

        </div>
        <!--End Search -->
        <div class="col-12 col-lg-12">
            <button type="submit" class="w-full h-12 px-6 text-blue-100 transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800" id="button-addon2">
                <i class="fas fa-search"></i>&emsp;Search
            </button>
        </div>
        <br />
    </div>
    </form>
</div>

<!---------Sets list----------->

    <div class="container">
        <div class="row justify-content-md-center">
            <!--Sets-->
            @if (count($legoSets) === 0)
                <p class="text-center text-gray-700 text-2xl font-bold pt-3">No record found</p>
            @else
            @foreach($legoSets as $set)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div style="">
                        @if($set->set_img_url)
                            <img src="{{ $set->set_img_url }}" class="lego-set-img mx-auto d-block object-fit-cover w-100" alt="{{ $set->name }}" height="300px">
                        @else    
                            <img src="{{ asset('images/lego-default.jpg') }}" class="lego-set-img mx-auto d-block object-fit-cover w-100" alt="{{ $set->name }}" height="300px">
                        @endif
                        </div>
                        <div class="card-body">
                            <p class="card-text">

                            </p><h3 class="text-center">{{ $set->name }}</h3>
                            <p class="text-center">{{ $set->set_num }} | {{ $set->theme->name }} </p>

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
            @endif
                <!--End Sets-->

            <!--Pagination-->
            <div class="col-12 col-md-12"></div>
            <div class="col text-center">
                <nav aria-label="Page navigation example">
                    <div class="p-6">
                        {{ $legoSets->onEachSide(0)->appends(['keywords' => request('keywords'),
                                                                'theme' => request('theme'),
                                                                'sortBy' => request('sortBy'),
                                                                'year'=>request('year'),
                                                                'fromParts'=>request('fromParts'),
                                                                'toParts'=>request('toParts'),] )->links() }}
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
                                @auth
                                    @if ((count($userWishlists) === 0 || is_null($userWishlists)))
                                            <p class="text-center text-gray-700 text-2xl font-bold pt-3">No wishlist found. Please create wishlist
                                                <br /><br /><a href="/wishlist/create"><button type="button" class="btn btn-primary">Here</button></a>
                                            </p>
                                    @else
                                        @if(count($legoSets) !== 0)
                                            @foreach($userWishlists as $wishlist)
                                                <div class="col-10 col-sm-6 col-lg-4 mb-4">
                                                    <form action="{{ route('sets.store') }}" class="w-100" method="post">
                                                        @csrf
                                                        <p>
                                                            <input type="hidden" name="wishlist_id" value="{{ $wishlist->id }}"/>
                                                            <input type="hidden" name="set_id" value="{{ $set->id }}"/>
                                                            <button type="submit" class="w-full h-10 text-blue-100 transition-colors duration-150 bg-blue-500 rounded-lg focus:shadow-outline hover:bg-blue-800" onclick="showLoading()">{{ $wishlist->name }}</button>
                                                        </p>
                                                    </form>

                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                             @else
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                                <svg class="fill-current w-4 h-4 mr-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                                <p class="mb-0">Please log in to view your wish list.</p>
                                            </div>
                                        </div>
                                        <div class="col-4"></div>

                                        <div class="col-12"><br /></div>

                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <a href="/login">
                                            <button type="button" class="w-full h-10 px-6 text-green-100 transition-colors duration-150 bg-green-500 rounded-lg focus:shadow-outline hover:bg-green-800"
                                                    id="button-addon2" >
                                                &emsp;Log in
                                            </button></a>
                                        </div>
                                        <div class="col-4"></div>
                             @endauth
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
