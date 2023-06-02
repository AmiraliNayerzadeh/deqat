@component('admin.layout.content')

{{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">موقعیت ها</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item active">همه موقعیت ها</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
{{--breadcrumb--}}

    <div class="row">
        @foreach($category->where('parent' , 0) as $categories)
            <div class="col-lg-4">
                <div class="card shade">
                    <div class="card-header d-inline">
                        <i class="bi bi-{{$categories->icon}}"></i>
                        <h3 class="d-inline">{{$categories->name}}</h3>
                        <a class="btn btn-sm btn-outline-info d-inline mx-1" href="{{route('categories.edit' ,$categories)}}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form class="d-inline mx-2" action="{{route('categories.destroy' ,$categories)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($category->where('parent' , $categories->id) as $cateTwo)
                                <li>
                                    <h4 class="my-5 d-inline">
                                        <i class="bi bi-{{$cateTwo->icon}}"></i>
                                        <a href="{{route('categories.edit' ,$cateTwo)}}">{{$cateTwo->name}}</a>
                                        <form class="d-inline" action="{{route('categories.destroy' ,$cateTwo)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger " type="submit">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </h4>
                                </li>

                                @foreach($category->where('parent' , $cateTwo->id) as $cateThree)
                                    <li>
                                        <h6 class="mx-4 pb-2 border-bottom d-inline">
                                            <i class="bi bi-{{$cateThree->icon}}"></i>
                                            <a href="{{route('categories.edit' ,$cateThree)}}">{{$cateThree->name}}</a>
                                            <form class="d-inline" action="{{route('categories.destroy' ,$cateThree)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm  btn-outline-danger small" type="submit">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </h6>
                                    </li>
                                @endforeach

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endcomponent
