@component('home.layout.content')

    <div class="rounded bg-light  border border-primary  p-4 my-4  ">
        <div class="fw-bolder text-secondary">
            خوش آمدی
            {{auth()->user()->name}}
            عزیز!
        </div>
    </div>


    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
                class="nav-link active"
                id="ex1-tab-1"
                data-mdb-toggle="tab"
                href="#ex1-tabs-1"
                role="tab"
                aria-controls="ex1-tabs-1"
                aria-selected="true">حساب کاربری شخصی</a>
        </li>
        @if(auth()->user()->is_owner == 1)
        <li class="nav-item" role="presentation">
            <a
                class="nav-link"
                id="ex1-tab-2"
                data-mdb-toggle="tab"
                href="#ex1-tabs-2"
                role="tab"
                aria-controls="ex1-tabs-2"
                aria-selected="false">اطلاعات مربوط به مجموعه</a>
        </li>
        @endif
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex1-content">
        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
            @include('home.profile.personal')

        </div>

        <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            @include('home.profile.ownerinfo')
        </div>

    </div>
    <!-- Tabs content -->


@endcomponent
