@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">گالری مربوط به {{$location->name}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('locations.index')}}">موقعیت ها</a></li>
                        <li class="breadcrumb-item active">گالری</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <div class="card-body">
            <a class="btn btn-success" href="{{route('location.gallery.create', $location)}}">ایجاد گالری</a>
            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">تصویر</th>
                    <th scope="col">تاریخ ایجاد</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($images as $image)
                    <tr>
                        <th scope="row">{{$image->id}}</th>
                        <th scope="row"><img class="img-fluid rounded-circle" height="80px" width="80px" src="{{$image->path}}"></th>
                        <td>{{$locations->created_at}}</td>

                        <td>
                            <a class="btn" href="{{route('location.gallery.edit' , ['location' => $locations])}}">
                                <i class="bi bi-images"></i>
                            </a>
                        </td>

                        <td>
                            <a class="btn" href="{{route('locations.edit' , ['location' => $locations])}}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@endcomponent
