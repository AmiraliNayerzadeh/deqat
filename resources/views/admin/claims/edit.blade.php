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
                        <li class="breadcrumb-item "><a href="{{route('claims.index')}}">درخواست اداعای مالکیت</a></li>
                        <li class="breadcrumb-item active">ویرایش درخواس</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('claims.update' , $claim)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                درخواست کننده:<b>{{$claim->user->name}}</b>
                <br>
                مکان:<b>{{$claim->location->name}}</b>

                <hr>
                <div class="row bmd-form-group">
                    <div class="form-group col-lg-4">
                        <label for="name">نام:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : $claim->name}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="phone">شماره تلفن:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone') ? old('phone') : $claim->phone}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="email">ایمیل:</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{old('email') ? old('email') : $claim->email}}" required>
                    </div>


                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات شهر</label>
                        <textarea name="description" id="editor" cols="30" rows="10">{{old('description') ? old('description') : $claim->description}}</textarea>
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="status">وضعیت:</label>
                        <select class="form-control" name="status" id="status">
                            <option value="برنامه ریزی برای تماس">برنامه ریزی برای تماس</option>
                            <option value="درحال بررسی">درحال بررسی</option>
                            <option value="تایید شده">تایید شده</option>
                            <option value="رد شده">رد شده</option>
                        </select>
                    </div>



                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">بروز رسانی</button>
            </div>
        </form>
    </div>

    <div class="card shade f-forth my-4">
        <form action="{{route('claims.destroy' , $claim)}}" method="post">
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
