@if(count(\App\Models\Claim::where('user_id' , auth()->user()->id)->get()))
    <div class="card my-3">
        <div class="card-header">
            <h4 class="card-title fw-bold">لیست درخواست ها ادعای مالکیت</h4>
        </div>
        <div class="card-body">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                <tr>
                    <th>مکان مروبطه</th>
                    <th>تاریخ درخواست</th>
                    <th>وضعیت</th>
                    <th>مشاهده</th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Models\Claim::where('user_id', auth()->user()->id)->get() as $claim)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{$claim->location->logo}}"  style="width: 75px; height: 75px" class="rounded-circle"
                            />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{$claim->location->name}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{$claim->created_at}}</p>
                    </td>
                    <td>
                        <span class="badge badge-success rounded-pill d-inline">{{$claim->status}}</span>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{route('location.single' , $claim->location->slug)}}">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif


<form action="{{route('locations.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <div class="card">
            <div class="card-header border-primary border-3">
                <h4 class="card-title fw-bold">ایجاد مکان جدید</h4>
            </div>
            <div class="card-body row">

                    <div class="card-body">
                        <hr>
                        <div class="row bmd-form-group">

                            <div class="form-group col-lg-3">
                                <label for="name">نام*:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                            </div>


                            <div class="form-group col-lg-3">
                                <label for="logo">لوگو*:</label>
                                <input type="file" name="logo" id="logo" class="form-control" required>
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="cover">کاور:</label>
                                <input type="file" name="cover" id="cover" class="form-control">
                            </div>

                            <div class="form-group col-lg-3">
                                <label for="city_id">شهر*:</label>
                                <select class="form-control"  name="city_id" id="city_id" required>
                                    <option disabled>شهر مورد نظر را انتخاب کنید.</option>
                                    @foreach(\App\Models\City::all() as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="description">توضیحات شهر</label>
                                <textarea name="description" id="editor" cols="30" rows="10">{{old('description')}}</textarea>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="phone">شماره تماس*:</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}" required>
                            </div>

                            <div class="form-group col-lg-8">
                                <label for="address">آدرس*:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" required>
                            </div>


                            <div class="form-group col-lg-4">
                                <label for="phoneSec">شماره تماس ثانویه:</label>
                                <input type="text" name="phoneSec" id="phoneSec" class="form-control" value="{{old('phoneSec')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="email">ایمیل:</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="instagram">اینستاگرام:</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" value="{{old('instagram')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="linkedin">لینکدین:</label>
                                <input type="text" name="linkedin" id="linkedin" class="form-control" value="{{old('linkedin')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="twitter">توییتر:</label>
                                <input type="text" name="twitter" id="twitter" class="form-control" value="{{old('twitter')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="web">وبسایت:</label>
                                <input type="text" name="web" id="web" class="form-control" value="{{old('web')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="video">ویدیو:</label>
                                <input type="text" name="video" id="video" class="form-control" value="{{old('video')}}">
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="properties">ویژگی ها:</label>
                                <select class="form-control js-example-theme-multiple" multiple="multiple" name="properties[]" id="properties" required>
                                    @foreach(\App\Models\Property::all() as $property)
                                        <option value="{{$property->id}}">{{$property->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="categories">دسته بندی ها:</label>
                                <select class="form-control js-example-theme-multiple" multiple="multiple" name="categories[]" id="categories" required>
                                    @foreach(\App\Models\Category::latest()->get() as $categories)
                                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-lg-4">
                                <label for="map">آدرس نقشه:</label>
                                <input type="text" name="map" id="map" class="form-control" value="{{old('map')}}" required>
                            </div>



                            <div class="form-group col-lg-4">
                                <label for="images">گالری:</label>
                                <input class="form-control" type="file" name="images[]" id="images" multiple>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-primary float-end" type="submit">ایجاد موقعیت</button>
            </div>
        </div>
    </form>


