@component('admin.layout.content')

{{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">شهر ها</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item active">همه شهر ها</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
{{--breadcrumb--}}


    <div class="card shade">
        <div class="card-body">
{{--            <h5 class="card-title">کاربران</h5>--}}

            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">نام</th>
                    <th scope="col">نام به انگلیسی</th>
                    <th scope="col">تاریخ ایجاد</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($citys as $citys)
                <tr>
                    <th scope="row">{{$citys->id}}</th>
                    <td>{{$citys->name}}</td>
                    <td>{{$citys->nameEnglish}}</td>
                    <td>{{$citys->phone}}</td>
                    <td>{{$citys->created_at}}</td>
                    <td>
                        <a class="btn" href="{{route('citys.edit' , ['city' => $citys])}}">
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
