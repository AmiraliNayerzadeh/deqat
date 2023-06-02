
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler"
                type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <img src="/main/image/defult/deqat-logo.png" height="80" alt="deqat logo" loading="lazy"/>
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">درباره</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('city.index')}}" id="navbarDropdownMenuLink" role="button"
                       data-mdb-toggle="dropdown" aria-expanded="false">شهر ها
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(\App\Models\City::all() as $city)
                        <li>
                            <a class="dropdown-item" href="{{route('city.single' , $city->slug)}}">{{$city->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown position-static">
                    <a class="nav-link dropdown-toggle" href="{{route('home.category.index')}}" id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                       aria-expanded="false">
                        دسته بندی ها
                    </a>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu mt-0" aria-labelledby="navbarDropdown" style="
                          border-top-left-radius: 0;
                          border-top-right-radius: 0;
                        ">
                        <div class="container">
                            <div class="row my-4">
                                @foreach(\App\Models\Category::where('parent' , '0')->get() as $category)
                                <div class="col mb-3 mb-lg-0">
                                    <div class="list-group list-group-flush">
                                        <a href="{{route('home.category.archive' , $category->slug)}}" class="list-group-item list-group-item-action fw-bolder">{{$category->name}}</a>
                                        @foreach(\App\Models\Category::where('id' , $category->id)->get() as $cate)
                                        <a href="{{route('home.category.archive' , $cate->slug)}}" class="list-group-item list-group-item-action">{{$cate->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">

        @auth
            <!-- Avatar -->
                <div class="dropdown">
                    <a
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false">
                        <img
                            src="{{auth()->user()->avatar}}"
                            class="rounded-circle"
                            height="50"
                            loading="lazy"/>
                        <span class="mx-2">{{auth()->user()->name}}</span>
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item" href="{{route('profile.index')}}">پروفایل کاربری</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('logout')}}">خروج</a>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest
                <a class="btn btn-outline-primary mx-1" href="{{route('login')}}">ورود</a>
                <a class="btn btn-primary mx-1" href="{{route('register')}}">ثبت نام</a>
            @endguest

        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
