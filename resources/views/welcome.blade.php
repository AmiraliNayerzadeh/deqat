@component('.home.layout.content')


    <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-inner rounded">
            <div class="carousel-item active">
                <svg class="bg-main" width="100%" height="100%" aria-hidden="true"
                     preserveAspectRatio="xMidYMid slice" focusable="false"></svg>

                <div class="container ">
                    <div class="carousel-caption">
                        <h1 class="fw-bolder">شهر رو کاوش کن</h1>
                        <p>به راحتی کاوش کن، مقایسه کن و انتخاب کن</p>
                        <form action="{{route('location.index')}}" class="d-flex align-items-center justify-content-center align-center">
                            <div class="card col-lg-6">
                                <div class="card-body">
                                    <div class="row d-flex">
                                        <div class="form-group col-lg-6">
                                            <label class="float-start text-primary" for="name">نام مکان:</label>
                                            <input class="form-control" type="text" name="name" id="name"
                                                   placeholder="دنبال کجا میگردین؟">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="float-start text-primary" for="city">کدوم شهر؟</label>
                                            <select class="form-control form-select" name="city" id="city">
                                                <option disabled selected value="">شهر مورد نظر را انتخاب کنید</option>
                                                @foreach(\App\Models\City::all() as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}  {{$city->nameEnglish}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-search"></i>
                                        جستجو
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->


    <div class="container ">
        <!-- Three columns of text below the carousel -->
        <div class="row my-3 w-100">
            <div class="col">
                <h3 class=" fw-bold">محبوب ترین شهر ها</h3>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-primary" href="{{route('city.index')}}">مشاهده همه شهر ها</a>
            </div>
        </div>

        <div class="row ">
            @foreach(\App\Models\City::latest()->limit(4)->get() as $citys)
                <div class="col-6 col-lg-3 col-md-12 mb-4 mb-lg-0 mx-0">
                    <div class="card h-100 w-100 ">
                        <div class="bg-image hover-overlay ripple" data-ripple-color="light"
                             style="background-image: url('{{$citys->image}}') ; background-position: center; background-repeat: no-repeat ; height: 10rem; background-size: cover">
                            <a href="{{route('city.single' , $citys)}}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>

                            <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                                <path fill="#fff"
                                      d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('city.single' , $citys)}}">
                                    {{$citys->name}} | {{$citys->nameEnglish}}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div><!-- /.row -->

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">


    <div class="row my-3">
        <div class="row my-3 w-100">
            <div class="col">
                <h3 class=" fw-bold">آخرین موقعیت های افزوده شده</h3>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-primary" href="{{route('location.index')}}">مشاهده موقعیت ها</a>
            </div>
        </div>
        @foreach(\App\Models\Location::latest()->limit(6)->get() as $locations)
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 my-2">
                <div class="card h-100">
                    <div class="bg-image hover-overlay ripple" data-ripple-color="light"
                         style="background-image: url('{{$locations->cover}}') ; background-position: center; background-repeat: no-repeat ; height: 14rem; background-size: cover">
                        <a href="{{route('location.single' , $locations)}}">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                        </a>

                        <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                            <path fill="#fff"
                                  d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{route('location.single' , $locations)}}">
                                {{$locations->name}}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- /.row -->

    <hr class="featurette-divider">


    <div class="bg-light rounded p-5 row featurette d-flex align-items-center">
        <div class="col-md-7">
            <h2 class="featurette-heading text-primary fw-bolder">
                کسب و کار خود را
                <span class="text-danger">
                                    مدرن
                </span>
                معرفی کنید.
            </h2>
            <p>
                به راحتی اطّلاعات کسب کار خود را ثبت کنید تا مشتریان بتوانند به راحت ترین روش شما را پیدا کنند و
                شما را ارزیابی کنند.
                <a class="btn btn-primary my-3 float-end" href="#">میخواهم کسب و کارم را معرفی کنم.</a>
            </p>
        </div>
        <div class="col-md-5">
            <img src="/main/image/defult/bg-2.png" class="img-fluid rounded" alt="" srcset="">
        </div>
    </div>




    <div class="row my-3">
        <div class="row my-3 w-100">
            <div class="col">
                <h3 class=" fw-bold">محبوب ترین کافه ها</h3>
            </div>
            <div class="col text-end">
                <a class="btn btn-outline-primary" href="#">مشاهده موقعیت ها</a>
            </div>
        </div>
        @foreach(\App\Models\Category::where('id' ,'=' , 2)->limit(8)->get() as $cate)
            @foreach($cate->locations as $coffe)
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 my-2">
                    <div class="card h-100">
                        <div class="bg-image hover-overlay ripple" data-ripple-color="light"
                             style="background-image: url('{{$coffe->cover}}') ; background-position: center; background-repeat: no-repeat ; height: 10rem; background-size: cover">
                            <a href="{{route('location.single' , $coffe)}}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>

                            <svg class="position-absolute" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 1440 320" style="left: 0; bottom: 0">
                                <path fill="#fff"
                                      d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{route('location.single' , $coffe)}}">
                                    {{$coffe->name}}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div><!-- /.row -->










    <hr class="featurette-divider">

    <div class="row featurette d-flex align-items-center bg-light rounded p-4">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading featurette-heading text-primary fw-bolder">
                بیش از
                <span class="text-danger">
                    {{count(\App\Models\Location::all())}}
                </span>
                موقعیت ثبت شده.
            </h2>

            <p>
                موقیعت های زیادی را ثبت کرده ایم تا شما بتوانید به راحتی مکان های مورد نظر خود را پیدا کنید و دیگاه دیگر
                کاربران را بخوانید.
            </p>


        </div>
        <div class="col-md-5 order-md-1">
            <img src="/main/image/defult/location_icon.png" class="img-fluid rounded" alt="" srcset="">
        </div>
    </div>

    {{--    <hr class="featurette-divider">--}}



    <!-- /END THE FEATURETTES -->

@endcomponent
