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
        <form action="/edit" method="post">
            <input name="_method" type="hidden" value="PUT">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="id" value="{{ $list->title }}">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="latitude" placeholder="latitude">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="longitude" placeholder="longitude">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="city" placeholder="please enter city">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="is_active" placeholder="please enter is_active">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="min" placeholder="please enter min">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="max" placeholder="please enter max">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="order" placeholder="please enter order">
            </div>
            <div class="form-group">
                <label for="id">Name</label>
                <input type="text" class="form-control" name="list_type" placeholder="please enter list_type">
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
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
