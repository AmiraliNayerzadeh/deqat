@component('admin.layout.content')

    {{--breadcrumb--}}
    <div class="row">
        <div class="page-header breadcrumb-header f-main  p-3 mr-2 ml-2 m-2">
            <div class="row align-items-end ">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h3 class="lite-text ">ایجاد موقعیت جدید</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <ol class="breadcrumb c-all-dark float-sm-right">
                        <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a>
                        </li>
                        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">داشبورد</a></li>
                        <li class="breadcrumb-item "><a href="{{route('locations.index')}}">موقعیت ها</a></li>
                        <li class="breadcrumb-item active">ایجاد گالری جدید</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{--breadcrumb--}}


    <div class="card shade">
        <form action="{{route('location.gallery.store' , $location)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="card-body">
                <hr>
{{--                <div class="card-body">--}}
{{--                    <div id="images_section">--}}
{{--                    </div>--}}
{{--                    <button class="btn btn-sm btn-danger" type="button" id="add_product_image">تصویر جدید</button>--}}
{{--                </div>--}}

                <input type="file" name="images[]" id="" multiple>

            </div>
            <div class="card-footer">
                <button class="btn btn-success" type="submit">ثبت</button>
            </div>
        </form>
    </div>


@endcomponent
