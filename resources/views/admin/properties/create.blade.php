@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ایجاد ویژگی جدید</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('properties.index')}}">ویژگی ها</a></li>
                        <li class="breadcrumb-item active">ایجاد ویژگی جدید</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('properties.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <hr>
                <a href="https://icons.getbootstrap.com/" class="text-info"> میتوانید لیست آیکن ها را از اینجا مشاهده کنید.</a>
                <div class="row bmd-form-group">
                    <div class="form-group col-lg-6">
                        <label for="title">عنوان ویژگی:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required placeholder="وای فای رایگان">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="icon">آیکون:</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="{{old('icon')}}" placeholder="ui-checks" required >
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">ثبت</button>
            </div>
        </form>
    </div>


@endcomponent
