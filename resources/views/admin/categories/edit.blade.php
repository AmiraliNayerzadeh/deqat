@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ویرایش دسته بندی</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('categories.index')}}">دسته بندی</a></li>
                        <li class="breadcrumb-item active">ویرایش دسته بندی</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('categories.update' , $category)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <img src="{{$category->cover}}" class="img-fluid">
                <a href="https://icons.getbootstrap.com/" class="text-info"> میتوانید لیست آیکن ها را از اینجا مشاهده کنید.</a>
                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-3">
                        <label for="name">نام دسته بندی*:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : $category->name}}" required>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="name">نام دسته بندی*:</label>
                        <select class="form-control" name="parent" id="parent">
                            <option {{$category->parent == 0 ? 'selected' : ''}} value="0">خودم دسته بندی اصلی هستم!</option>
                            @foreach(\App\Models\Category::latest()->get() as $parent)
                                <option {{$category->parent == $parent->id ? 'selected' : ''}} value="{{$parent->id}}">{{$parent->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="icon">آیکون:</label>
                        <input type="text" name="icon" id="icon" class="form-control" value="{{old('icon') ? old('icon') : $category->icon}}" placeholder="cup-hot">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="cover">کاور:</label>
                        <input class="form-control" type="file" name="cover" id="cover">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات:</label>
                        <textarea name="description" id="editor" cols="30" rows="10">{{old('description') ? old('description') : $category->description}}</textarea>
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">بروز رسانی</button>
            </div>
        </form>
    </div>

    <div class="card shade f-forth my-4">
        <form action="{{route('categories.destroy' , $category)}}" method="post">
            @csrf
            @method('DELETE')
            <div class="card-header">
                <i class="fas fa-exclamation-triangle"></i>
                منطقه حساس
            </div>
            <div class="card-body">
                <p>در این قسمت میتوانید این کاربر را حدف کنید. در صورت اینکه کاربر حذف شود، اطلاعات آن قابل بازگردانی
                    نیست.</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-danger" type="submit">حذف</button>
            </div>
        </form>
    </div>


@endcomponent
