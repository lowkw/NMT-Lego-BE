<footer class="@if(auth()) text-neutral-500 bg-neutral-900 @else text-slate-500 bg-slate-900 @endif
               w-full flex flex-row gap-8 py-12 text-sm pb-0" >

    <div class="flex flex-col items-center justify-center space-y-4 w-full pt-5" style="background:#d3d3d38f">
            <div class="container row">
                <div class="col-12 col-md-6">
                    <div class="pb-4">
                        <img src="{{ asset('/images/logo.png') }}" class="img-fluid" alt=""  width="270">
                    </div>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0 ">
                        <li class="pb-2 pb-md-1">Privacy Policy</li>
                        <li class="pb-2 pb-md-1">Terms & Conditions</li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <h2 class="pb-2">Menu</h2>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li class="pb-2 pb-md-1"><a href="{{route('home')}}" class="text-decoration-none">Home</a></li>
                        <li class="pb-2 pb-md-1"><a href="{{route('sets.index')}}" class="text-decoration-none">Sets</a></li>
                        <li class="pb-2 pb-md-1"><a href="" class="text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <h2 class="pb-2">Account</h2>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li class="pb-2 pb-md-1"><a href="{{route('dashboard')}}" class="text-decoration-none">Profile</a></li>
                        <li class="pb-2 pb-md-1"><a href="{{route('legoCollection.index')}}" class="text-decoration-none">Collection</a></li>
                        <li class="pb-2 pb-md-1"><a href="{{route('wishlist.index')}}" class="text-decoration-none">Wishlists</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-2">
                    <h2 class="pb-2">Follow Us</h2>
                    <ul class="flex flex-wrap text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li><img src="{{ asset('/images/fb.png') }}" class="img-fluid" alt=""  width="40" height="40"></li>
                        <li><img src="{{ asset('/images/twitter.png') }}" class="img-fluid" alt=""  width="40" height="40"></li>

                    </ul>
                </div>
                <div></div>
            </div>
        <div class="h-full w-full text-left text-center pt-3 bg-blue-500" style="background-color: #159bce;">
            <div >
                <p class="text-white">
                    &copy; Copyright 2023 Adrian Gould
                </p>
            </div>
        </div>
    </div>
</footer>
