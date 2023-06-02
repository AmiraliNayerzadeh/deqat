@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ایجاد دسته بندی جدید</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('categories.index')}}">دسته بندی ها</a></li>
                        <li class="breadcrumb-item active">ایجاد دسته بندی جدید</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <a href="https://icons.getbootstrap.com/" class="text-info"> میتوانید لیست آیکن ها را از اینجا مشاهده کنید.</a>
                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-3">
                        <label for="name">نام دسته بندی*:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="name">نام دسته بندی*:</label>
                        <select class="form-control" name="parent" id="parent">
                            <option value="0">خودم دسته بندی اصلی هستم!</option>
                            @foreach(\App\Models\Category::latest()->get() as $parent)
                                <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="icon">آیکون:</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="{{old('icon')}}" placeholder="cup-hot">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="cover">کاور:</label>
                        <input class="form-control" type="file" name="cover" id="cover">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات:</label>
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
