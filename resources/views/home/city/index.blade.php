@component('home.layout.content')
{{--    <div class="row my-3 text-center">--}}
{{--        <h1 class="fw-bolder py-3">لیست شهر ها</h1>--}}
{{--        @foreach(\App\Models\City::latest()->paginate(20) as $city)--}}
{{--        <div class="col-6 col-lg-4 my-2">--}}
{{--            <div class="card">--}}
{{--                <a href="{{route('city.single' , $city)}}">--}}
{{--                    <img src="{{$city->image}}" class="card-img-top" alt="{{$city->name}}">--}}
{{--                </a>--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title text-center">--}}
{{--                        <a class="link-dark" href="{{route('city.single' , $city)}}">--}}
{{--                            {{$city->name}} | {{ $city->nameEnglish }}--}}
{{--                        </a>--}}
{{--                    </h5>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}




    <div class="row ">
                <h1 class="fw-bolder py-3">لیست شهر ها</h1>

    @foreach(\App\Models\City::latest()->paginate(20) as $city)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="card">
                    <div
                        class="bg-image hover-overlay ripple" data-ripple-color="light">
                        <img src="{{$city->image}}" class="img-fluid"/>
                        <a href="{{route('city.single' , $city)}}">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                        </a>

                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                            <path fill="#fff"
                                  d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('city.single' , $city)}}">
                                {{$city->name}} | {{ $city->nameEnglish }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endcomponent
