@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ایجاد دیدگاه جدید</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('comments.index')}}">نظرات</a></li>
                        <li class="breadcrumb-item active">ایجاد کابر جدید</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('comments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-4">
                        <label for="user_id">کاربر نظر دهنده:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            @foreach(\App\Models\User::all() as $users)
                            <option value="{{$users->id}}">{{$users->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="commentable_id">ایجاد نظر برای:</label>
                        <select class="form-control" name="commentable_id" id="commentable_id">
                            @foreach(\App\Models\Location::all() as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="commentable_type" value="App\Models\Location">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="star">امتیاز:</label>
                        <select class="form-control" name="star" id="star">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="comment">متن دیدگاه</label>
                        <textarea class="form-control" name="comment" cols="30" rows="10">{{old('comment')}}</textarea>
                    </div>


                    <div class="form-group col-lg-6">
                        <label for="comment">تایید:</label>
                        <select class="form-control" name="approved" id="approved">
                            <option value="0">خیر</option>
                            <option value="1">بله</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">ثبت</button>
            </div>
        </form>
    </div>


@endcomponent
