@component('home.layout.content')
    <div class="card">
        <div class="card-header d-flex align-items-end"
             style="background-image: url('/main/image/defult/istanbul-view-cover.jpg') ; background-position: center; background-repeat: no-repeat ; height: 25rem; background-size: cover">
            <div class="bg-light rounded d-flex align-items-center p-3">
                <h1 class="fw-bolder mx-3">دسته بندی ها</h1>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach(\App\Models\Category::where('parent' , 0)->get() as $category)
            <div class="col-lg-4">
                <div class="card my-2">
                    <div class="card-header bg-primary">
                        <h4 class="fw-bolder">
                            <a class="text-white" href="{{route('home.category.archive' , $category->slug)}}">
                                <i class="bi bi-{{$category->icon}}"></i>
                                {{$category->name}}
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-light list-group-small">
                            @foreach(\App\Models\Category::where('parent' , $category->id)->get() as $sub)
                            <li class="list-group-item px-3">
                                <a href="{{route('home.category.archive' , $sub->slug)}}">
                                    <i class="bi bi-{{$sub->icon}}"></i>
                                    {{$sub->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endcomponent
