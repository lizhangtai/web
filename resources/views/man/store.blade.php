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
                    <a href="{{ url('man/store/detail') }}" class="btn btn-primary" style="margin-top: 20px;">添加门店</a>
                    <table class="table table-striped" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>图片</th>
                                <th>名称</th>
                                <th>地址</th>
                                <th>电话</th>
                                <th>维度</th>
                                <th>经度</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td><img src="{{ asset('storage/' . $store->image) }}" width="64" height="64"></td>
                                <td>{{ $store->name }}</td>
                                <td>{{ $store->address }}</td>
                                <td>{{ $store->tel }}</td>
                                <td>{{ $store->lat }}</td>
                                <td>{{ $store->long }}</td>
                                <td>
                                    <a href="{{ url('man/store/detail') . '?id=' . $store->id }}">编辑</a>
                                    <a href="{{ url('man/store/del') . '?id=' . $store->id }}">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </main>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    </body>

</html>