<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <style>
        * {
            font-family: "DM Sans", sans-serif;
            font-size: 1.1rem;
        }
        /* body {
            background-color: rgba(242, 241, 238, 1);
        } */

        .auth-labels {
              display:inline-block;
              width: 8em;
        }

        .auth-textbox {
            /* display: inline-block; */
            margin-bottom: .5em;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row m-2 align-items-center">
            <div class="col text-start">
                <a href="#" class="link-underline link-underline-opacity-0" style="color:black">
                    <img src="..\images\laravel-logo.png" alt="Logo" style="height: 3rem;">
                </a>
            </div>
            <div class="col text-end">
                <div class="fs-6 dropdown">
                    @if(Auth::check())
                       {{ Auth::user()->userInfo->user_firstname.' '.Auth::user()->userInfo->user_lastname }}
                    <span class="fs-8 mr-2" style="font-weight: bold;">
                        @if(Auth::user()->hasRole('admin'))
                          : Admin User
                        @elseif(Auth::user()->hasRole('bookeeper'))
                          : Bookkeeper
                        @elseif(Auth::user()->hasRole('assembler'))
                          : Assembler
                        @elseif(Auth::user()->hasRole('auditor'))
                          : Accountant
                        @else
                          : User
                        @endif
                    </span>
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li>@include('slugs.logout')</li>
                    </ul>
                       
                    @endif
                 </div>
            </div>
        </div>
        <div class="container-fluid ">
            @if(!Auth::check())
                @yield('auth-content')
            @else
                @yield('page-content')
            @endif
        </div>
        <!-- <div class="row">
            <div class="col">
                
            </div>
        </div> -->
    </div>
</body>
</html>
