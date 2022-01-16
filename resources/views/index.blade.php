<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>House</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
        }
    </style>

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="form">
        <form action="/" method="get" class="form-inline">
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="id" @if(isset($params['id'])) value="{{ $params['id'] }}" @endif placeholder="please enter ID">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="latitude" @if(isset($params['latitude'])) value="{{ $params['latitude'] }}" @endif placeholder="latitude">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="longitude"  @if(isset($params['longitude'])) value="{{ $params['longitude'] }}" @endif placeholder="longitude">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="city"  @if(isset($params['city'])) value="{{ $params['city'] }}" @endif placeholder="please enter city">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="is_active"  @if(isset($params['is_active'])) value="{{ $params['is_active'] }}" @endif placeholder="please enter is_active">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="min"  @if(isset($params['min'])) value="{{ $params['min'] }}" @endif placeholder="please enter min">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="max"  @if(isset($params['max'])) value="{{ $params['max'] }}" @endif placeholder="please enter max">
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <select class="form-control" name="order">
                    <option value="desc"  @if(isset($params['order']) && $params['order'] == 'desc') selected @endif>desc</option>
                    <option value="asc"  @if(isset($params['order']) && $params['order'] == 'asc') selected @endif>asc</option>
                </select>
            </div>
            <div class="form-group">
                {{--            <label for="id">Name</label>--}}
                <input type="text" class="form-control" name="list_type"  @if(isset($params['list_type'])) value="{{ $params['list_type'] }}" @endif placeholder="please enter list_type">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
            <form action="create" method="get">
                <a class="btn btn-default" href="/create" role="button">Add</a>
            </form>
        </form>
    </div>
    @foreach($lists as $list)
    <div class="row">
            <div class="card mb-3">
                <div class="row no-gutters" style="margin: 20px">
                    <div class="col-md-4">
                        <img src="{{ $list->coverImageUrl ?? 'https://resources.kamernet.nl/Content/images/placeholder/no-pic-advert.png' }}" class="card-img" style="height:200px;width: 100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body" style="width: 100%">
                            <p class="card-text">
                                ID: {{ $list->externalId }}
                            </p>
                            <p class="card-text">
                                Location: {{ $list->rawAvailability }}
                            </p>
                            <p class="card-text">
                                City: {{ $list->city }}
                            </p>
                            <p class="card-text">
                                Description: {{ $list->pageDescription }}
                            </p>
                            <p class="card-text">
                                Pet: {{ $list->pets }}
                            </p>
                            <p class="card-text">
                                rent: {{ $list->rent }}
                            </p>
                            <p class="card-text">
                                deposit: {{ $list->deposit ?? 'no' }}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <form action="/edit/{{ $list->externalId }}">
                                <button type="submit" class="btn btn-success">Detail</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form action="">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

    </div>
    @endforeach
    <div class="row">
        {{ $lists->links() }}
    </div>
</div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
        crossorigin="anonymous"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
</body>
</html>
