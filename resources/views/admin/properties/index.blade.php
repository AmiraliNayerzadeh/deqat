@component('admin.layout.content')

{{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ویژگی ها</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item active">ویژگی ها</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
{{--breadcrumb--}}


    <div class="card shade">
        <div class="card-body">
{{--            <h5 class="card-title">ویژگی ها</h5>--}}

            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">آیکون</th>
                    <th scope="col">نام</th>
                    <th scope="col">تاریخ ایجاد</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)
                <tr>
                    <th scope="row">{{$property->id}}</th>
                    <td>
                        <i class="display-4 bi bi-{{$property->icon}}"></i>
                    </td>
                    <td>{{$property->title}}</td>
                    <td>{{$property->created_at}}</td>
                    <td>
                        <a class="btn" href="{{route('properties.edit' , $property)}}">
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
