@component('home.layout.content')

    <div class="card">
        <div class="card-header d-flex align-items-end"
             style="background-image: url({{$location->cover}}) ; background-position: center; background-repeat: no-repeat ; height: 25rem; background-size: cover">
            <div class="bg-light rounded d-flex align-items-center p-3">
                <img style="height: 6rem" class="img-fluid rounded" src="{{$location->logo}}" alt="{{$location->name}}">
                <h1 class="fw-bolder mx-3">{{$location->name}}</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 my-2">
                    @foreach($location->categories as $category)
                        <a class="btn btn-lg btn-outline-primary m-1" href="{{route('home.category.archive' , $category->slug)}}">
                            <i class="bi bi-{{$category->icon}}"></i>
                            {{$category->name}}
                        </a>
                    @endforeach
                </div>
                <div class="col-lg-7">
                    {{--Description--}}
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title fw-bolder">
                                <i class="bi bi-arrows-fullscreen"></i>
                                توضیحات
                            </h4>
                        </div>
                        <div class="card-body">
                            {!! $location->description !!}
                        </div>
                    </div>
                    {{--Description--}}


                    {{--Description--}}
                    <div class="card my-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title fw-bolder">
                                <i class="bi bi-map"></i>
                                مسیریابی
                            </h4>
                        </div>
                        <div class="card-body">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7698.626861183792!2d51.506947377215155!3d35.77847464808177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e04bce2a742b5%3A0x8ac235bcf82603d6!2sEtka%20Store!5e0!3m2!1sen!2s!4v1685471361431!5m2!1sen!2s"
                                height="450" style="border:0; width: 100%" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    {{--Description--}}


                    {{--Property--}}
                    <div class="card my-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title fw-bolder">
                                <i class="bi bi-map"></i>
                                ویژگی ها
                            </h4>
                        </div>
                        <div class="card-body">
                            @foreach($location->properties as $properties)
                                <div class="btn btn-light m-2">
                                    <i class="display-6 bi bi-{{$properties->icon}}"></i>
                                    {{$properties->title}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{--Property--}}

                </div>

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title fw-bolder">
                                <i class="bi bi-chat-text-fill"></i>
                                اطلّاعات تماس
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">

                                @if($location->address)
                                    <li class="list-group-item m-2">
                                        <b>
                                            <i class="bi bi-pin-map-fill"></i>
                                            آدرس:
                                        </b>
                                        <span>
                                            {{$location->address}}
                                        </span>
                                    </li>
                                @endif


                                @if($location->phone)
                                    <li class="list-group-item m-2">
                                        <b>
                                            <i class="bi bi-telephone"></i>
                                            شماره تماس:
                                        </b>
                                        <a href="tel:{{$location->phone}}">{{$location->phone}}</a>
                                    </li>
                                @endif

                                @if($location->phoneSec)
                                    <li class="list-group-item m-2">
                                        <b>
                                            <i class="bi bi-telephone"></i>
                                            شماره تماس دوم:
                                        </b>
                                        <a href="tel:{{$location->phoneSec}}">{{$location->phoneSec}}</a>
                                    </li>
                                @endif

                                @if($location->email)
                                    <li class="list-group-item m-2">
                                        <b>
                                            <i class="bi bi-inbox"></i>
                                            پست الکترونیک:
                                        </b>
                                        <a href="mailto:{{$location->email}}">{{$location->email}}</a>
                                    </li>
                                @endif


                                <li class="list-group-item m-2">
                                    @if($location->instagram)
                                        <a class="btn btn-light m-2"
                                           href="https://www.instagram.com/{{$location->instagram}}">
                                            <i class="bi bi-instagram"></i>
                                            {{$location->instagram}}
                                        </a>
                                    @endif

                                    @if($location->linkedin)
                                        <a class="btn btn-light m-2"
                                           href="https://www.linkedin.com/{{$location->linkedin}}">
                                            <i class="bi bi-linkedin"></i>
                                            {{$location->linkedin}}
                                        </a>
                                    @endif

                                    @if($location->twitter)
                                        <a class="btn btn-light m-2"
                                           href="https://www.twitter.com/{{$location->twitter}}">
                                            <i class="bi bi-twitter"></i>
                                            {{$location->twitter}}
                                        </a>
                                    @endif

                                    @if($location->web)
                                        <a class="btn btn-light m-2" href="https//{{$location->web}}">
                                            <i class="bi bi-diagram-3"></i>
                                            {{$location->web}}
                                        </a>
                                    @endif


                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="card my-3">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title fw-bolder">
                                <i class="bi bi-images"></i>
                                گالری
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($location->gallery as $images)

                                    <a href="{{$images->path}}" data-toggle="lightbox"
                                       data-gallery="example-gallery" class="col-sm-4">
                                        <img src="{{$images->path}}" class="img-fluid">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if($location->user_id == null)
                        <div class="card my-3">
                            <div class="card-header bg-primary text-white">
                                <h4 class="card-title fw-bolder">
                                    <i class="bi bi-patch-check"></i>
                                    ادعای مالکیت
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-lg btn-secondary" data-mdb-toggle="modal"
                                            data-mdb-target="#exampleModal">
                                        <i class="bi bi-person-check-fill"></i>
                                        من صاحب این کسب و کارم
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        <i class="bi bi-person-check-fill"></i>
                                                        درخواست ادعای مالکیت
                                                    </h5>
                                                    <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                @guest
                                                    <div class="modal-body">
                                                        برای تکمیل فرم ادعای مالکیت ابتدا
                                                        <a href="{{route('register')}}">ثبت نام</a>
                                                        کنید.
                                                    </div>
                                                @endguest

                                                @auth
                                                    <form action="{{route('claim')}}" method="post">
                                                        @csrf
                                                        @method('POST')
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="form-group col-lg-6">
                                                                    <label for="name">نام و نام خانوادگی:</label>
                                                                    <input class="form-control" type="text" name="name"
                                                                           id="name"
                                                                           value="{{auth() ? auth()->user()->name : old('name')}}">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <label for="phone">شماره تماس:</label>
                                                                    <input class="form-control" type="text" name="phone"
                                                                           id="phone"
                                                                           value="{{auth() ? auth()->user()->phone : old('phone')}}">
                                                                </div>

                                                                <div class="form-group col-lg-12 my-2">
                                                                    <label for="email">ایمیل:</label>
                                                                    <input class="form-control" type="text" name="email"
                                                                           id="email"
                                                                           value="{{auth() ? auth()->user()->email : old('email')}}">
                                                                </div>

                                                                <div class="form-group col-lg-12 my-2">
                                                                    <label for="description">توضیحات:</label>
                                                                    <small>
                                                                        دارای جه مدارکی هستید که ثابت میکند این کسب و
                                                                        کار
                                                                        برای شماست؟
                                                                    </small>
                                                                    <textarea
                                                                        placeholder="دارای جه مدارکی هستید که ثابت میکند این کسب و کار برای شماست؟"
                                                                        class="form-control" name="description"
                                                                        id="description" cols="30"
                                                                        rows="10"> {{old('email')}}</textarea>
                                                                </div>

                                                                <input type="hidden" name="user_id"
                                                                       value="{{auth()->user()->id}}">
                                                                <input type="hidden" name="location_id"
                                                                       value="{{$location->id}}">

                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-mdb-dismiss="modal">لفو
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">ثبت درخواست
                                                            </button>
                                                        </div>
                                                    </form>

                                                @endauth

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="card my-3">
        <div class="card-header bg-primary">
            <h4 class="text-white fw-bolder">
                <i class="bi bi-chat-square-quote"></i>
                نظرات کاربران
            </h4>
        </div>
        <div class="card-body">

            @foreach(\App\Models\Comment::where('commentable_id' , $location->id)->where('commentable_type' , 'App\Models\Location')->where('approved', 1)->get() as $comment)
                <div class="card my-4">
                    <div class="card-header">
                        نظر
                        <span class="fw-bold text-primary"> {{$comment->user->name}} </span>
                        اینه که:
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-1">
                                <img class="img-fluid rounded-circle" style="height: 60px" ;width="60px"
                                     src="{{$comment->user->avatar}}" alt="{{$comment->user->name}}">
                            </div>
                            <div class="col-lg-11">
                                {!! $comment->comment !!}
                                <div class="w-100">
                                    @if($comment->star == 1)
                                        <span class="icon">★</span>
                                    @elseif($comment->star == 2)
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    @elseif($comment->star == 3)
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    @elseif($comment->star == 4)
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    @elseif($comment->star == 5)
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @auth
                <form action="{{route('comment.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="row">

                        <div class="form-group col-lg-4 text-center">
                            <img class="img-fluid rounded-circle my-2" style="height: 75px ; width: 75px"
                                 src="{{auth()->user()->avatar}}" alt="">

                            <h3 class="fw-bolder text-primary">{{auth()->user()->name}} عزیز؛</h3>
                            <span>
                            نظر شما برا خیلی ها مهمّه...
                            <br>
                            پس بنویس!
                        </span>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="comment">دیدگاه شما:</label>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="3"></textarea>
                            </div>

                            <div class="form-group my-3">
                                <label class="w-100" for="comment">امتیاز شما:</label>

                                <div class="rating">
                                    <label>
                                        <input type="radio" name="star" value="1"/>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="star" value="2"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="star" value="3"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="star" value="4"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="star" value="5"/>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <input type="hidden" name="commentable_type" value="{{get_class($location)}}">
                    <input type="hidden" name="commentable_id" value="{{$location->id}}">
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <button class="btn btn-lg btn-secondary float-end" type="submit">ثبت دیدگاه</button>

                </form>

            @endauth
            @guest
                برای ثبت نظر خود، وارد حساب کاربری خود شوید.
                <div class="my-2">
                    <a class="btn btn-primary" href="{{route('login')}}">ورود</a>
                    <a class="btn btn-secondary" href="{{route('register')}}">ثبت نام</a>
                </div>
            @endguest
        </div>
    </div>



@endcomponent
