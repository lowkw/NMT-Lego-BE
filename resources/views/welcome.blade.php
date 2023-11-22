<x-guest-layout>
<section class="home-title-banner">
    <div class="container">
        <div class="row flex-column align-items-end">
            <h1 class="page-title display-1 text-end" style="color:white;"><span class="job-color">J</span>ust <span class="job-color">O</span>ne <span class="job-color">B</span>rick</h1>
            <div class="col col-md-6">
                <p class="heading-text text-end">Welcome to Just One Brick, your go-to destination for all things LEGO! Embrace the world of endless possibilities.</p>
            </div>
            <div class="flex gap-5 col col-md-6 mt-5 justify-content-end">
                <a role="button" href="{{route('register')}}" class="btn btn-primary w-50 m-0">Sign Up</a>
                <a role="button" href="{{route('sets.index')}}" class="btn btn-light w-50 m-0">Browse Sets</a>
            </div>
        </div>
    </div>
</section>

<div class="container banner-overlay" >
    <div class="row align-items-center">
        <div class="col-12 col-md-8">
            <p>With Just One Brick, you can create a personalized account that allows you to curate and manage your LEGO sets effortlessly. Whether you're a seasoned collector or just starting your brick-building journey, our platform offers a seamless experience for adding and organizing your LEGO sets. Dive into a community of like-minded enthusiasts, share your collection, and discover new sets to expand your LEGO universe. Just One Brick is where passion meets precision, allowing you to build, organize, and connect one brick at a time. Join us and let the adventure unfold!</p>
            <a role="button" href="{{route('register')}}" class="btn btn-primary w-50 m-0 mt-5">Start for free</a>
        </div>
        <div class="col-12 col-md-4">
            <img src="{{ asset('images/about-just-one-brick.jpg') }}" alt="Just One Brick Lego sculpture" class="rounded-corners">
        </div>
    </div>
</div>

<!---------Sets list----------->

    <div class="container p-5">
        <h2 class="my-5">Latest Sets</h2>
        <div class="row justify-content-md-center">
                <!--Sets-->
            @foreach($legoSets as $set)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card h-100">
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
</x-guest-layout>