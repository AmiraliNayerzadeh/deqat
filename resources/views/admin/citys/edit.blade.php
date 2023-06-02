@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ویرایش شهر</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('citys.index')}}">شهر</a></li>
                        <li class="breadcrumb-item active">ویرایش شهر</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('citys.update' , $city)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <img src="{{$city->image}}" class="img-fluid rounded-circle text-center" style="height: 6rem">

                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-4">
                        <label for="name">نام شهر به فارسی:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : $city->name}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="nameEnglish">نام شهر به انگلیسی:</label>
                        <input type="text" name="nameEnglish" id="nameEnglish" class="form-control" value="{{old('nameEnglish') ? old('nameEnglish') : $city->nameEnglish}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="image">تصویر شهر:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات شهر</label>
                        <textarea name="description" id="editor" cols="30" rows="10">{{old('description') ? old('description') : $city->description}}</textarea>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">بروز رسانی</button>
            </div>
        </form>
    </div>

    <div class="card shade f-forth my-4">
        <form action="{{route('citys.destroy' , $city)}}" method="post">
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
