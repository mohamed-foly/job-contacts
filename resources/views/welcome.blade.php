<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Job contacts</title>

    {{-- <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> --}}
    
    <!-- jQuery 3.1.1 -->
    <script src="{{ asset('libs/jquery/3.2.1/jquery.min.js') }}"></script>

    <!-- Propper 1.16.1 -->
    <script src="{{ asset('libs/propper/1.16.1/js/popper.min.js') }}"></script>    
    
    <!-- Bootstrap 4.4.1 -->
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <script src="{{ asset('libs/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>

    <!-- Axios 1.16.1 -->
    <script src="{{ asset('libs/axios/0.19.2/js/axios.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container col-md-12">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Job contacts
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <div class="col-md-12">
                            <a style="color:red">0.1</a>
                        </div>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown" style = "margin-right:15px;">
                                <a id="languageDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @lang('consts.language_label') (@lang('consts.language')) <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                                    <a class="dropdown-item" href="{{ route('language.switch','en') }}">
                                        English
                                    </a>
                                    <a class="dropdown-item" href="{{ route('language.switch','ar') }}">
                                        العربية
                                    </a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('cp.home') }}"> @lang('consts.management') </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="">
                    <div class="col-md-12">
                        <div class="row">

                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{__('Information')}}</div>
            
                            <div class="card-body">
                                <div class="col-md-10">
                                    <p>
                                        <br>
                                        This website acts as companies guide, thease companies searched or may search for specific position. <br><br>
                                        If you know any company currently have open position feel free to add it, may helping some one ealse.<br>
                                        By offering download, you can customize it as you need on excel or any similar.
                                    </p>
                                    <center>
                                        @if(isset($jobs_count) && $jobs_count)
                                         Current Jobs <p style="font-weight: bold;"> ({{$jobs_count}}) </p>
                                        @endif
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">{{__('Add Job')}}</div>
            
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="col-md-12">

                                        <div class="form-group row">
                                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                                            <div>
                                                <input id="company_name" type="company_name" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>
                
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <div>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                                            <div>
                                                <input id="position" type="position" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus>
                
                                                @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>     
                                </form>
                            </div>
                        </div>
                    </div>
                    


                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-header">{{__('Actions')}}</div>
            
                            <div class="card-body">
                                
                                
                                <a href="{{route('export')}}"><button class="btn btn-success" >Download</button></a>
                                <hr>
                                <h3 class="card-title">@include('common.perpage')</h3>
                                <table class="table table-hover"> 
                                    <thead>
                                        <th>Company Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Position</th>
                                        <th>Created At</th>
                                    </thead>
                                    <tbody>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>{{ $job->company_name }}</td>
                                                <td>{{ $job->email }}</td>
                                                <td>{{ $job->position }}</td>
                                                <td>{{ $job->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <div class="row">
                                            {!! $jobs->render() !!}
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
