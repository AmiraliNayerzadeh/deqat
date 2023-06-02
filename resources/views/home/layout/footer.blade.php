<footer class="pt-5 mt-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5 class="fw-bold">دسته بندی ها:</h5>
                <ul class="nav flex-column">
                    @foreach(\App\Models\Category::where('parent' , 0)->get() as $category)
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="fw-bold">شهرها:</h5>
                <ul class="nav flex-column">
                    @foreach(\App\Models\City::latest()->limit(6)->get() as $city)
                        <li class="nav-item mb-2"><a href="{{route('city.single', $city->slug)}}" class="nav-link p-0 text-body-secondary">{{$city->name}} {{$city->nameEnglish}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5 class="fw-bold">لینک های مفید:</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">درباره ما</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">تماس با ما</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">قوانین و ضوابط</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">سوالات متداول</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">حساب کاربری</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5 class="fw-bold">عضویت در خبر نامه:</h5>
                    <p>خلاصه ماهانه چیزهای جدید و هیجان انگیز ما برای شما ارسال خواهد شد.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">آدرس ایمیل:</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="آدرس ایمیل خود را وارد کنید">
                        <button class="btn btn-primary" type="button">عضویت</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© توسعه با عشق توسط
                <a href="">گروه توسعه مولی</a>
            </p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </div>

    </div>
</footer>
