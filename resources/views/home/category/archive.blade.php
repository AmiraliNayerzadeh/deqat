@component('home.layout.content')
    <div class="card">
        <div class="card-header d-flex align-items-end" style="background-image: url('{{$category->cover}}') ; background-position: center; background-repeat: no-repeat ; height: 20rem; background-size: cover">
            <div class="bg-light rounded d-flex align-items-center p-3">
                <h1 class="fw-bolder mx-3">
                    <i class="bi bi-{{$category->icon}}"></i>
                    {{$category->name}}
                </h1>
            </div>
        </div>
    </div>
    @if($category->parent == 0)
        <div class="row my-3">
            <h5>دسته بندی های مرتبط:</h5>
            @foreach(\App\Models\Category::where('parent' , $category->id)->get() as $sub)
            <div class="col-4 col-lg-2">
                <a class="btn btn-lg  d-flex btn-secondary text-center" href="{{route('home.category.archive' , $sub->slug)}}">
                    <i class="bi bi-{{$sub->icon}}"></i>
                    {{$sub->name}}
                </a>
            </div>
            @endforeach
        </div>
    @endif

    <div class="row my-3">
        @foreach($category->locations as $locations)
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <div class="card h-100">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light" style="background-image: url('{{$locations->cover}}') ; background-position: center; background-repeat: no-repeat ; height: 14rem; background-size: cover">
                        <a href="{{route('location.single' , $locations)}}">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                        </a>

                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                            <path fill="#fff" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{route('location.single' , $locations)}}">
                                {{$locations->name}}
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endcomponent
