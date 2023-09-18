<x-guest-layout>
<section class="title-banner p-0" style="background-image: url({{$set->set_img_url}});">
    <div class="background-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0 overflow-hidden text-center">
                    <h1 class="page-title" style="color:white;">{{$set->name}}</h1>
                    <p class="page-subtitle" style="color:white;">{{$set->set_num}}</p>      
                </div>
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
    </div>
</div>
    <div class="container pt-5">
        <h2>Related Sets</h2>
        <div class="row justify-content-md-center">
            <!--Sets-->
            @foreach($relatedSets as $set)
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
            <!--End Sets-->
        </div>
    </div>

</x-guest-layout>
