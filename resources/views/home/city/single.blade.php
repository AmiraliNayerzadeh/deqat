@component('home.layout.content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="fw-bolder">
                        {{$city->name}}
                    </h1>
                    <h3>{{$city->nameEnglish}}</h3>
                    <hr>
                    <section>
                        {!! $city->description !!}
                    </section>
                </div>
                <div class="col-lg-4 rounded" style="background-image: url({{$city->image}}) ; background-position: center; background-repeat: no-repeat ;  background-size: cover">
{{--                    <img class="img-fluid rounded" src="{{$city->image}}" alt="{{$city->name}}">--}}
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3 text-center">
        <h3 class="fw-bold my-5">محبوب ترین کسب و کار ها در {{$city->name }}</h3>
        @foreach(\App\Models\Location::where('city_id' , $city->id)->limit(12)->get() as $locations)
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 my-3">
                <div class="card  h-100">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light" style="background-image: url('{{$locations->cover}}') ; background-position: center; background-repeat: no-repeat ; height: 14rem; background-size: cover">
                        <a href="{{route('location.single' , $locations->slug)}}">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                        </a>

                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                            <path fill="#fff" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('location.single' , $locations)}}">
                                {{$locations->name}}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endcomponent
