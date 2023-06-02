@component('admin.layout.content')

{{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">نظرات</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item active">همه نظرات</li>
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
                    <th scope="col">نام نظر دهنده</th>
                    <th scope="col">موقعیت مربوطه</th>
                    <th scope="col">متن نظر</th>
                    <th scope="col">امتیاز</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تاریخ ایجاد</th>
                    <th scope="col">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->location->name}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->star}} ستاره </td>
                    <td>{{$comment->approve}}
                        @if($comment->approved == 1)
                            تایید شده
                        @else
                            تایید نشده
                        @endif
                    </td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <a class="btn" href="{{route('comments.edit' ,  $comment)}}">
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
