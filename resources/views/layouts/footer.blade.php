<footer class="@if(auth()) text-neutral-500 bg-neutral-900 @else text-slate-500 bg-slate-900 @endif
               w-full flex flex-row gap-8 py-12 text-sm pb-0" >

    <div class="flex flex-col items-center justify-center space-y-4 w-full pt-5 ..." style="background:#d3d3d38f">
        <div>
            <div class="grid grid-cols-6 gap-6">
                <div></div>
                <div>
                    <div class="mb-2 text-xs sm:text-sm md:text-base  font-semibold text-gray-900 dark:text-white">
                        <img src="{{ asset('/images/logo.png') }}" class="img-fluid" alt=""  width="300" height="300">
                    </div>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0 ">
                        <li class="text-xs sm:text-sm md:text-base">Privacy Policy</li>
                        <li class="text-xs sm:text-sm md:text-base">Terms & Conditions</li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-2 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl font-semibold text-gray-900 dark:text-white ">Menu</h2>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li class="text-xs sm:text-sm md:text-base ">Home</li>
                        <li class="text-xs sm:text-sm md:text-base ">Blog</li>
                        <li class="text-xs sm:text-sm md:text-base ">Sets</li>
                        <li class="text-xs sm:text-sm md:text-base ">Theme</li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-2 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl font-semibold text-gray-900 dark:text-white">Account</h2>
                    <ul class="max-w-md space-y-1 text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li class="text-xs sm:text-sm md:text-base">Profile</li>
                        <li class="text-xs sm:text-sm md:text-base">Collections</li>
                        <li class="text-xs sm:text-sm md:text-base">Wishlist</li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-2 text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl font-semibold text-gray-900 dark:text-white">Follow Us</h2>
                    <ul class="flex flex-wrap text-gray-800 list-none list-inside dark:text-gray-400 pl-0">
                        <li class="text-xs sm:text-sm md:text-base"><img src="{{ asset('/images/fb.png') }}" class="img-fluid" alt=""  width="40" height="40"></li>
                        <li class="text-xs sm:text-sm md:text-base"><img src="{{ asset('/images/twitter.png') }}" class="img-fluid" alt=""  width="40" height="40"></li>

                    </ul>
                </div>
                <div></div>
            </div>
        </div>
        <div class="h-full w-full text-left text-center pt-3 bg-blue-500" style="background-color: #159bce;">
            <div >
                <p class="text-white">
                    &copy; Copyright 2022 Adrian Gould
                </p>
            </div>
        </div>
    </div>
</footer>
