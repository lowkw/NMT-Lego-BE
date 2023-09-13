<x-guest-layout>

<section class="title-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                <h1 class="page-title" style="color:white;">Edit Wishlist</h1>            </div>
        </div>
    </div>
</section>

    <!-- Container -->
    <div class="container banner-overlay mt-5" >
        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-2 rounded border-red-800 mb-4">
                <i class="fa fa-triangle-exclamation text-xl pl-2 pr-4"></i>
                You have errors in your form submission.
            </div>
        @endif

        <form action="{{ route('wishlist.update',compact(['wishlist'])) }}"
              class="flex flex-col gap-4"
              method="post">

            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label"><b>Name</b></label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="{{ old("name") ?? $wishlist->name }}">
                <div id="nameHelp" class="form-text">Name it something descriptive like "My Birthday wishlist"</div>
                @error('name')
                <p class="text-red-800 mb-2 text-sm">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3 form-check form-switch">
                <label class="form-check-label" for="public">Public</label>
                <input type="checkbox" class="form-check-input" role="switch" id="public" name="public"
                       {{ $wishlist->public == 0 ? "" : "checked" }} />
            </div>
            <div class="">

                <div class="mt-6 flex flex-row gap-4">
                    <a href="{{ route('dashboard') }}"
                       class="btn btn-secondary">
                        <i class="fa fa-circle-left"></i> {{ __("Back") }}
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="fa fa-floppy-disk"></i> {{ __("Update") }}
                    </button>
                </div>
            </div>
        </form>
    </div>
<!---------End Sets list----------->

</x-guest-layout>
