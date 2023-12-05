<div class="global-navbar">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              @php 
              $setting= App\Models\Setting::find(1);
              @endphp
                <img src="{{asset('uploads/settings/'.$setting->logo)}}" class="w-100" alt="logo"/>
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                <h5>Advertise Here</h5>
                </div>  
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
  <div class="container">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active"  href="{{url('/')}}">Home</a>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link active" href="#" role="button" data-bs-toggle= aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            
          </ul>
        </li>
        @php
        $categories= App\Models\Catagory::where('navbar_status','0')->where('status','0')->get();
        @endphp
        @foreach($categories as $cateitem)

        <li class="nav-item">
          <a class="nav-link" href="{{url('news',$cateitem->slug)}}">{{$cateitem->name}}</a>
        </li>
        @endforeach
        @if(Auth::check())
        <li>
          <a class="nav-link btn btn-danger"  href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          logout 
        </a>
        <form id="logout-form" action="{{route('logout') }}" method="post" class="d-none">
          @csrf
          </form>
</li>
@endif
      </ul>

    </div>
  </div>
</nav>
</div>