<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6749ec7941.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>

</head>

<body>
    @include('sweetalert::alert')

    <div class="sidenav">
        <form action="{{ route('product.list') }}" method="get" class="search-form">
            <img src="{{ secure_asset('images/logo.png')}}"class="logo">
            <ul>
                <li><i class="fas fa-search"></i>
                    <input type="text" class="form-control" placeholder="Search" name="term" value="{{$search['term']}}">
                </li>
                <li><i class="fas fa-home"></i><a href="{{ route('product.list')}}">HOME</a></li>
                <li><i class="fas fa-gamepad"></i>GAME
                    <ul class="list-category" name="term" value="{{$search['term']}}">
                            @foreach($categories as $category)
                            <li value="{{$search['term']}}" name="term" value="{{$category->code }}" {{ ($category->code === old('category'))? ' selected' : '' }} >
                                 {{ $category->name }}
                            </li>
                            @endforeach
                        </select>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('promotion.list')}}"><i class="fas fa-tags"></i>PROMOTION</li>
                    </a>
                @can('create', \App\Models\User::class)
                <li><i class="fas fa-user-edit"></i></i><a href="{{ route('admin.product')}}">EDIT</a></li>
                @endcan
            </ul>
        </form>

        <div class="login">
            <ul>
                <!--<li><button type="submit" class="btn btn-login">LOGIN</button></li>-->
                <li><button type="submit" class="btn btn-register"><a href="{{route('logout') }}">LOGOUT</a></button></li>
            </ul>

        </div>
    </div>

    <div class="main">
    @yield('content')
    </div>
</body>