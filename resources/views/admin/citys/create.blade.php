@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ایجاد شهر جدید</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('citys.index')}}">شهر ها</a></li>
                        <li class="breadcrumb-item active">ایجاد کابر جدید</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('citys.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-4">
                        <label for="name">نام شهر به فارسی:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="nameEnglish">نام شهر به انگلیسی:</label>
                        <input type="text" name="nameEnglish" id="nameEnglish" class="form-control" value="{{old('nameEnglish')}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="image">تصویر شهر:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات شهر</label>
                        <textarea name="description" id="editor" cols="30" rows="10">{{old('description')}}</textarea>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">ثبت</button>
            </div>
        </form>
    </div>


@endcomponent
