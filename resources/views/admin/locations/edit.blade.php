@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ویرایش موقعیت</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('locations.index')}}">موقعیت</a></li>
                        <li class="breadcrumb-item active">ویرایش موقعیت</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('locations.update' , $location)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <img class="img-fluid rounded"  width="200" src="{{$location->logo}}" alt="">
                <img class="img-fluid rounded"  width="200" src="{{$location->cover}}" alt="">
                <hr>
                <div class="row bmd-form-group">

                    <div class="form-group col-lg-3">
                        <label for="name">نام*:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name') ? old('name') : $location->name}}" required>
                    </div>


                    <div class="form-group col-lg-3">
                        <label for="logo">لوگو*:</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="cover">کاور:</label>
                        <input type="file" name="cover" id="cover" class="form-control">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="city_id">شهر*:</label>
                        <select class="form-control"  name="city_id" id="city_id" required>
                            <option disabled>شهر مورد نظر را انتخاب کنید.</option>
                            @foreach(\App\Models\City::all() as $loc)
                                <option {{$location->city_id == $loc->id ? 'selected' : ''}} value="{{$loc->id}}">{{$loc->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="description">توضیحات شهر</label>
                        <textarea name="description" id="editor" cols="30" rows="10">{{old('description') ? old('description') : $location->description}}</textarea>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="phone">شماره تماس*:</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone') ? old('phone') : $location->phone}}" required>
                    </div>

                    <div class="form-group col-lg-8">
                        <label for="address">آدرس*:</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{old('address') ? old('address') : $location->address}}" required>
                    </div>


                    <div class="form-group col-lg-4">
                        <label for="phoneSec">شماره تماس ثانویه:</label>
                        <input type="text" name="phoneSec" id="phoneSec" class="form-control" value="{{old('phoneSec') ? old('phoneSec') : $location->phoneSec}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="email">ایمیل:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email') ? old('email') : $location->email}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="instagram">اینستاگرام:</label>
                        <input type="text" name="instagram" id="instagram" class="form-control" value="{{old('instagram') ? old('instagram') : $location->instagram}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="linkedin">لینکدین:</label>
                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{old('linkedin') ? old('linkedin') : $location->linkedin}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="twitter">توییتر:</label>
                        <input type="text" name="twitter" id="twitter" class="form-control" value="{{old('twitter') ? old('twitter') : $location->twitter}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="web">وبسایت:</label>
                        <input type="text" name="web" id="web" class="form-control" value="{{old('web') ? old('web') : $location->web}}">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="video">ویدیو:</label>
                        <input type="file" name="video" id="video" class="form-control" value="{{old('video')}}">
                    </div>

                    <div class="form-group col-lg-8">
                        <label for="video">صاحب کسب و کار:</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">اطّلاعی ندارم!</option>
                            @foreach(\App\Models\User::all() as $user)
                                <option {{$location->user_id == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="properties">ویژگی ها:</label>
                        <select class="form-control js-example-theme-multiple" multiple="multiple" name="properties[]" id="properties">
                            @foreach(\App\Models\Property::all() as $property)
                                <option value="{{$property->id}}" {{ in_array($property->id , $location->properties->pluck('id')->toArray()) ? 'selected' : ''}}> {{$property->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="properties">دسته بندی ها:</label>
                        <select class="form-control js-example-theme-multiple" multiple="multiple" name="categories[]" id="categories">
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{$category->id}}" {{ in_array($category->id , $location->categories->pluck('id')->toArray()) ? 'selected' : ''}}> {{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="map">آدرس نقشه:</label>
                        <input type="text" name="map" id="map" class="form-control" value="{{old('map') ? old('map') : $location->map}}" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="map">گالری:</label>
                        <input class="form-control" type="file" name="images[]" id="image" multiple>
                    </div>


                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">بروز رسانی</button>
            </div>
        </form>
    </div>

    <div class="card shade f-forth my-4">
        <form action="{{route('locations.destroy' , $location)}}" method="post">
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
