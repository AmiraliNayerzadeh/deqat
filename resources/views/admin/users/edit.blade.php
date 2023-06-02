@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ویرایش کاربر</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('users.index')}}">کاربران</a></li>
                        <li class="breadcrumb-item active">ویرایش کاربر</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('users.update' , $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <img src="{{$user->avatar}}" class="img-fluid rounded-circle text-center" style="height: 6rem">

                <hr>
                <div class="row bmd-form-group">
                    <div class="form-group col-lg-4">
                        <label for="name">نام و نام خانوادگی:</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{old('name') ? old('name') : $user->name}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="email">پست الکترونیک:</label>
                        <input type="email" name="email" id="email" class="form-control"
                               value="{{old('email') ? old('email') : $user->email}}"
                               required>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="phone">شماره تلفن:</label>
                        <input type="text" name="phone" id="phone" class="form-control"
                               value="{{old('phone') ? old('phone') : $user->phone}}">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="avatar">تصویر پروفایل:</label>
                        <input type="file" name="avatar" id="avatar" class="form-control"
                               value="{{old('avatar') ? old('avatar') : $user->avatar}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="address">آدرس:</label>
                        <textarea class="form-control" name="address" id="address" cols="30"
                                  rows="1">{{old('address') ? old('address') : $user->address}}</textarea>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="about">درباره:</label>
                        <textarea class="form-control" name="about" id="about" cols="30"
                                  rows="1">{{old('about') ? old('about') : $user->about}}</textarea>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="age">سن:</label>
                        <input type="number" name="age" id="age" class="form-control"
                               value="{{old('age') ? old('age') : $user->age}}">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="city">شهر:</label>
                        <input type="text" name="city" id="city" class="form-control"
                               value="{{old('city') ? old('city') : $user->city}}">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="is_superuser">دسترسی Admin:</label>
                        <select name="is_superuser" id="is_superuser" class="form-control">
                            <option {{$user->is_superuser == 0 ? 'selected' : ''}} value="0">خیر</option>
                            <option {{$user->is_superuser == 1 ? 'selected' : ''}} value="1">بله</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="is_owner">نوع کاربر:</label>
                        <select name="is_owner" id="is_owner" class="form-control">
                            <option {{$user->is_owner == 0 ? 'selected' : ''}} value="0">مهمان</option>
                            <option {{$user->is_owner == 1 ? 'selected' : ''}} value="1">مدیر مجموعه</option>
                        </select>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="password">رمز عبور:</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="password_confirmation">تکرار رمز عبور:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">بروز رسانی</button>
            </div>
        </form>
    </div>

    <div class="card shade f-forth my-4">
        <form action="{{route('users.destroy' , $user)}}" method="post">
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
