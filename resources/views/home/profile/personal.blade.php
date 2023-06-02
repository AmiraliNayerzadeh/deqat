<form action="{{route('update.profile' , auth()->user()->id)}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PUT')
<div class="card">
    <div class="card-header border-primary border-3">
        <h4 class="card-title fw-bold">اطلّاعات شخصی</h4>
    </div>

    <div class="card-body row">
        <div class="text-center my-3">
            <img class="img-fluid rounded" style="max-height: 10rem" src="{{auth()->user()->avatar}}"
                 alt="{{auth()->user()->name}}">
        </div>

        <div class="col-lg-4 form-group my-2">
            <label for="name">نام و نام خانوادگی:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
        </div>

        <div class="col-lg-4 form-group my-2">
            <label for="email">پست الکترونیک:</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{auth()->user()->email}}">
        </div>


        <div class="col-lg-4 form-group my-2">
            <label for="phone">شماره تلفن:</label>
            <input type="text" name="phone" id="phone" class="form-control"
                   value="{{auth()->user()->phone}}">
        </div>

        <div class="col-lg-2 form-group my-2">
            <label for="age">سن:</label>
            <input type="text" name="age" id="age" class="form-control" value="{{auth()->user()->age}}"
                   placeholder="(برای مثال 27)">
        </div>

        <div class="col-lg-4 form-group my-2">
            <label for="city">شهر:</label>
            <input type="text" name="city" id="city" class="form-control" value="{{auth()->user()->city}}"
                   placeholder="نام شهر را وارد کنید. (برای مثال تهران)">
        </div>

        <div class="col-lg-6 form-group my-2">
            <label for="address">آدرس:</label>
            <textarea name="address" id="address" cols="30" rows="1" class="form-control"
                      placeholder="آدرس خود را وارد کنید">{{auth()->user()->address}}</textarea>
        </div>

        <div class="col-lg-6 form-group my-2">
            <label for="avatar">تصویر پروفایل:</label>
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>

    </div>

    <div class="card-footer">
        <button class="btn btn-primary float-end" type="submit">بروز رسانی حساب کاربری</button>
    </div>

</div>
</form>
