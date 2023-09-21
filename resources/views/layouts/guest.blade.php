<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- Latest compiled and minified CSS -->
    @vite(['resources/views/js/app.js', 'resources/views/css/style.css','resources/views/css/bootstrap.min.css','resources/views/css/solid.min.css','resources/views/js/bootstrap.bundle.js','resources/views/js/rangeSlider.js'])

</head>
<body>
<div id="profile-navigation" class="sticky-top" style="background-color:#0d6efd">
    <div class="container">
        <nav class="navbar navbar-expand-lg" aria-label="Eleventh navbar example">

            <div class="container-fluid">
                <p></p>
                <p></p>
                <ul id="menu-menu-1" class="navbar-nav gap-3">
                    <!--<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42 nav-item"><a title="contact-us" href="#" class="nav-link" style="color:white;">Login</a></li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42 nav-item"><a title="contact-us" href="#" class="nav-link" style="color:white;">|</a></li>
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43 nav-item"><a title="profile" href="#" class="nav-link" style="color:white;">Sign Up</a></li>-->
                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-43" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-43 nav-item">
                        <form  id="logout-form" method="post" class="needs-validation" novalidate="" action="//route('user-logout')">
                            @csrf
                            <button class="ml-3">{{ __('Log out') }} </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>



    </div>
</div>
<div class="min-h-screen bg-gray-100 flex flex-col">

    @include('layouts.nav-menu')
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-gray-50 shadow">
            <div class="">
                {{ $header }}
            </div>


        </header>
    @endif


    <!-- Page Content -->
    <main class="flex-grow">

        @include('layouts.messages')

        {{ $slot }}

    </main>

    @include('layouts.footer')

</div>
<script>

function tailwindModalToggle(setId){
    //const modalButton = document.querySelector("[data-modal-toggle='small-modal']");
    const modal = document.querySelector("#defaultModal");
    modal.style.display = 'block';
    if(setId){
        setIdInputs = document.querySelectorAll('input[name="set_id"]');
        setIdInputs.forEach(el => {
            el.value = setId;
        });
    }
}

function closeTailwindModalToggle() {
    const modal = document.querySelector("#defaultModal");
    modal.style.display = 'none';
}
function showLoading() {
    // Show the loading element when the submit button is clicked
    document.getElementById('loading').style.display = 'block';
    closeTailwindModalToggle();
    var btnAddtoWishlist = document.getElementById('btnAddtoWishlist');
    btnAddtoWishlist.disabled = true;
}


</script>
</body>
</html>
