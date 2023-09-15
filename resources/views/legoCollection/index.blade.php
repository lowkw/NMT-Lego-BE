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
<div class="container pt-4" >
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


    <!--User Collection -->

    <div class="container">
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
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <a role="button" href="{{ route('sets.show', compact('set')) }}" class="btn btn-primary btn-sm">View Set -&gt;</a>
                            </div>
                            <p></p>
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
