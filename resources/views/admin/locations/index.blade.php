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


    <div class="card shade">
        <div class="card-body">
{{--            <h5 class="card-title">کاربران</h5>--}}

            <hr>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">لوگو</th>
                    <th scope="col">نام موقعیت</th>
                    <th scope="col">شهر</th>
                    <th scope="col">آدرس</th>
                    <th scope="col">شماره</th>
                    <th scope="col">صاحب</th>
                    <th scope="col">تاریخ ایجاد</th>
                    <th scope="col">گالری</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($location as $locations)
                <tr>
                    <th scope="row">{{$locations->id}}</th>
                    <th scope="row"><img class="img-fluid rounded-circle" height="80px" width="80px" src="{{$locations->logo}}"></th>
                    <td>{{$locations->name}}</td>
                    <td>{{$locations->city->name}}</td>
                    <td>{{$locations->address}}</td>
                    <td>{{$locations->phone}}</td>
                    <td>
                        @if($locations->user)
                        {{$locations->user->name}}
                        @else
                        مشخص نیست
                            @endif
                    </td>
                    <td>{{$locations->created_at}}</td>

                    <td>
                        <a class="btn" href="{{route('location.gallery.index' , ['location' => $locations])}}">
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
