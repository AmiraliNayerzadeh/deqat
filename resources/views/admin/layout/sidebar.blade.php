<div id="dw-s1" class="bmd-layout-drawer bg-faded ">

    <div class="container-fluid side-bar-container ">
        <header class="pb-0">
            <a class="navbar-brand ">
                <object class="side-logo" data="/dashboard/svg/logo-8.svg" type="image/svg+xml">
                </object>
            </a>
        </header>
        <p class="side-comment  fnt-mxs">گشت</p>
        <li class="side a-collapse short m-2 pr-1 pl-1">
            <a href="{{route('dashboard')}}"
               class="side-item {{Route::currentRouteName() == 'dashboard' ? 'selected' : ''}} "><i
                    class="fas fa-language  mr-1"></i>داشبورد</a>
        </li>
        {{--start user --}}
        <ul class="{{Route::currentRouteName() == 'users.index' || Route::currentRouteName() == 'users.create' ||Route::currentRouteName() ==  'users.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i> کاربران
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'users.index' || Route::currentRouteName() == 'users.create' ||Route::currentRouteName() ==  'users.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'users.index' ? 'selected' : ''}} "><a
                        href="{{route('users.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه
                        کاربران</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'users.create' ? 'selected' : ''}} "><a
                        href="{{route('users.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        کاربر جدید</a></li>
            </div>
        </ul>
        {{--end user --}}


        {{--start city --}}
        <ul class="{{Route::currentRouteName() == 'citys.index' || Route::currentRouteName() == 'citys.create' ||Route::currentRouteName() ==  'citys.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i> شهر ها
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'citys.index' || Route::currentRouteName() == 'citys.create' ||Route::currentRouteName() ==  'citys.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'citys.index' ? 'selected' : ''}} "><a
                        href="{{route('citys.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه
                        شهر ها</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'citys.create' ? 'selected' : ''}} "><a
                        href="{{route('citys.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        شهر جدید</a></li>
            </div>
        </ul>
        {{--end city --}}


        {{--start Location --}}
        <ul class="{{Route::currentRouteName() == 'locations.index' || Route::currentRouteName() == 'locations.create' ||Route::currentRouteName() ==  'locations.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i>موقعیت ها
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'locations.index' || Route::currentRouteName() == 'locations.create' ||Route::currentRouteName() ==  'locations.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'locations.index' ? 'selected' : ''}} "><a
                        href="{{route('locations.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه موقعیت ها</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'locations.create' ? 'selected' : ''}} "><a
                        href="{{route('locations.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        موقعیت جدید</a></li>
            </div>
        </ul>
        {{--end Location --}}


        {{--start Location --}}
        <ul class="{{Route::currentRouteName() == 'properties.index' || Route::currentRouteName() == 'properties.create' ||Route::currentRouteName() ==  'properties.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i>ویژگی ها
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'properties.index' || Route::currentRouteName() == 'properties.create' ||Route::currentRouteName() ==  'properties.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'properties.index' ? 'selected' : ''}} "><a
                        href="{{route('properties.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه ویژگی ها</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'properties.create' ? 'selected' : ''}} "><a
                        href="{{route('properties.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        ویژگی جدید</a></li>
            </div>
        </ul>
        {{--end Location --}}


        {{--start Categories --}}
        <ul class="{{Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.create' ||Route::currentRouteName() ==  'categories.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i>دسته بندی ها
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.create' ||Route::currentRouteName() ==  'categories.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'categories.index' ? 'selected' : ''}} "><a
                        href="{{route('categories.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه دسته بندی ها</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'categories.create' ? 'selected' : ''}} "><a
                        href="{{route('categories.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        دسته بندی جدید</a></li>
            </div>
        </ul>
        {{--end Categories --}}


        {{--start Claims --}}
        <ul class="{{Route::currentRouteName() == 'categories.index' || Route::currentRouteName() == 'categories.create' ||Route::currentRouteName() ==  'categories.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i>
                مالکیت ادعا
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'claims.index' || Route::currentRouteName() == 'claims.create' ||Route::currentRouteName() ==  'claims.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'claims.index' ? 'selected' : ''}} "><a
                        href="{{route('claims.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه درخواست ها</a></li>
            </div>
        </ul>
        {{--end Claims --}}



        {{--start Comments --}}
        <ul class="{{Route::currentRouteName() == 'comments.index' || Route::currentRouteName() == 'comments.create' ||Route::currentRouteName() ==  'comments.edit' ? 'side a-collapse' : 'side a-collapse short'}}">
            <a class="ul-text  fnt-mxs "><i class="fas fa-tachometer-alt mr-1"></i>نظرات
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div
                class="{{Route::currentRouteName() == 'comments.index' || Route::currentRouteName() == 'comments.create' ||Route::currentRouteName() ==  'comments.edit' ? 'side-item-container' : 'side-item-container hide animated'}}">
                <li class="side-item {{Route::currentRouteName() ==  'comments.index' ? 'selected' : ''}} "><a
                        href="{{route('comments.index')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>همه نظرات</a></li>
                <li class="side-item {{Route::currentRouteName() ==  'comments.create' ? 'selected' : ''}} "><a
                        href="{{route('comments.create')}}" class="fnt-mxs"><i class="fas fa-angle-right mr-2"></i>ایجاد
                        دسته نظر جدید</a></li>
            </div>
        </ul>
        {{--end Comments --}}











    </div>

</div>
