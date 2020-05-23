<!doctype html>
<html lang="zh">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
                    data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">
                                    <span data-feather="home"></span>
                                    门店管理 <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="shopping-cart"></span>
                                    汽车美容项目管理
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <span data-feather="users"></span>
                                    店员管理
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-3 offset-md-3">
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">名称</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="address">地址</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="tel">电话</label>
                                    <input type="text" class="form-control" id="tel" name="tel">
                                </div>          
                                <div class="form-group">
                                    <label for="image">图片</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                    @if (!is_null($store))
                                    <img src="{{ asset('storage/' . $store->image) }}" width="100" height="100" style="margin-top: 10px;">
                                    @endif
                                </div>                                
                                <div class="form-group">
                                    <label for="lat">维度</label>
                                    <input type="text" class="form-control" id="lat" name="lat">
                                </div>                                
                                <div class="form-group">
                                    <label for="tel">经度</label>
                                    <input type="text" class="form-control" id="long" name="long">
                                </div>                                                                
                                <button type="submit" class="btn btn-primary">保存</button>
                            </form>
                        </div>
                    </div>                    
                </main>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>        
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        @if (!is_null($store))
        <script>
        $(document).ready(function () {
            $('input[name="name"]').val('{{ $store->name }}');
            $('input[name="address"]').val('{{ $store->address }}');
            $('input[name="tel"]').val('{{ $store->tel }}');
            $('input[name="lat"]').val('{{ $store->lat }}');
            $('input[name="long"]').val('{{ $store->long }}');
        });
        </script>
        @endif
    </body>

</html>