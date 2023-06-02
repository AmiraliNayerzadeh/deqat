@component('home.layout.content')
    <div class="row my-3 text-center">
        <h1 class="fw-bolder py-3">موقعیت ها</h1>
        @foreach($location as $location)
            <div class="col-6 col-lg-4 my-2">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('location.single', $location->slug)}}">
                            <img src="{{$location->logo}}" class="card-img-top" alt="{{$location->name}}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <a class="link-dark" href="{{route('location.single', $location->slug)}}">
                                {{$location->name}}
                            </a>
                        </h5>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endcomponent
