<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ url('images/favicon.png') }}">
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
