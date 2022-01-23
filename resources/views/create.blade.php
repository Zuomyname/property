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
        <form action="#" method="post">
{{--            @error('id')--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        {{ $message }}--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @enderror--}}
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="id">externalId</label>
                <input type="text" id="externalId" class="form-control" name="externalId" placeholder="please enter externalId">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="id">areaRaw</label>--}}
{{--                <input type="text" class="form-control" name="areaRaw" placeholder="areaRaw">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="id">areaSqm</label>
                <input type="text" class="form-control" name="areaSqm" placeholder="areaSqm">
            </div>
            <div class="form-group">
                <label for="id">city</label>
                <input type="text" class="form-control" name="city" placeholder="please enter city">
            </div>
            <div class="form-group">
                <label for="id">furnish</label>
                <input type="text" class="form-control" name="furnish" placeholder="please enter furnish">
            </div>
            <div class="form-group">
                <label for="id">latitude</label>
                <input type="text" class="form-control" name="latitude" placeholder="please enter latitude">
            </div>
            <div class="form-group">
                <label for="id">longitude</label>
                <input type="text" class="form-control" name="longitude" placeholder="please enter longitude">
            </div>
            <div class="form-group">
                <label for="id">postalCode</label>
                <input type="text" class="form-control" name="postalCode" placeholder="please enter postalCode">
            </div>
            <div class="form-group">
                <label for="id">postedAgo</label>
                <input type="text" class="form-control" name="postedAgo" placeholder="please enter postedAgo">
            </div>
            <div class="form-group">
                <label for="id">propertyType</label>
                <input type="text" class="form-control" name="propertyType" placeholder="please enter propertyType">
            </div>
            <div class="form-group">
                <label for="id">rawAvailability</label>
                <input type="text" class="form-control" name="rawAvailability" placeholder="please enter rawAvailability">
            </div>
            <div class="form-group">
                <label for="id">rent</label>
                <input type="text" class="form-control" name="rent" placeholder="please enter rent">
            </div>
            <div class="form-group">
                <label for="id">rentDetail</label>
                <input type="text" class="form-control" name="rentDetail" placeholder="please enter rentDetail">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="id">rentRaw</label>--}}
{{--                <input type="text" class="form-control" name="rentRaw" placeholder="please enter rentRaw">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="id">title</label>
                <input type="text" class="form-control" name="title" placeholder="please enter title">
            </div>
            <div class="form-group">
                <label for="id">additionalCostsRaw</label>
                <input type="text" class="form-control" name="additionalCostsRaw" placeholder="please enter additionalCostsRaw">
            </div>
            <div class="form-group">
                <label for="id">deposit</label>
                <input type="text" class="form-control" name="deposit" placeholder="please enter deposit">
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="id">depositRaw</label>--}}
{{--                <input type="text" class="form-control" name="depositRaw" placeholder="please enter depositRaw">--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="id">descriptionNonTranslated</label>
                <input type="text" class="form-control" name="descriptionNonTranslated" placeholder="please enter descriptionNonTranslated">
            </div>
            <div class="form-group">
                <label for="id">descriptionTranslated</label>
                <input type="text" class="form-control" name="descriptionTranslated" placeholder="please enter descriptionTranslated">
            </div>
            <div class="form-group">
                <label for="id">energyLabel</label>
                <input type="text" class="form-control" name="energyLabel" placeholder="please enter energyLabel">
            </div>
            <div class="form-group">
                <label for="id">gender</label>
                <input type="text" class="form-control" name="gender" placeholder="please enter gender">
            </div>
            <div class="form-group">
                <label for="id">internet</label>
                <input type="text" class="form-control" name="internet" placeholder="please enter internet">
            </div>
            <div class="form-group">
                <label for="id">isRoomActive</label>
                <input type="text" class="form-control" name="isRoomActive" placeholder="please enter isRoomActive">
            </div>
            <div class="form-group">
                <label for="id">kitchen</label>
                <input type="text" class="form-control" name="kitchen" placeholder="please enter kitchen">
            </div>
            <div class="form-group">
                <label for="id">living</label>
                <input type="text" class="form-control" name="living" placeholder="please enter living">
            </div>
            <div class="form-group">
                <label for="id">matchAge</label>
                <input type="text" class="form-control" name="matchAge" placeholder="please enter matchAge">
            </div>
            <div class="form-group">
                <label for="id">matchCapacity</label>
                <input type="text" class="form-control" name="matchCapacity" placeholder="please enter matchCapacity">
            </div>
            <div class="form-group">
                <label for="id">matchGender</label>
                <input type="text" class="form-control" name="matchGender" placeholder="please enter matchGender">
            </div>
            <div class="form-group">
                <label for="id">matchLanguages</label>
                <input type="text" class="form-control" name="matchLanguages" placeholder="please enter matchLanguages">
            </div> <div class="form-group">
                <label for="id">matchStatus</label>
                <input type="text" class="form-control" name="matchStatus" placeholder="please enter matchStatus">
            </div>
            <div class="form-group">
                <label for="id">pageDescription</label>
                <input type="text" class="form-control" name="pageDescription" placeholder="please enter pageDescription">
            </div>
            <div class="form-group">
                <label for="id">pageTitle</label>
                <input type="text" class="form-control" name="pageTitle" placeholder="please enter pageTitle">
            </div>
            <div class="form-group">
                <label for="id">pets</label>
                <input type="text" class="form-control" name="pets" placeholder="please enter pets">
            </div>
            <div class="form-group">
                <label for="id">registrationCostRaw</label>
                <input type="text" class="form-control" name="registrationCostRaw" placeholder="please enter registrationCostRaw">
            </div>
            <div class="form-group">
                <label for="id">roommates</label>
                <input type="text" class="form-control" name="roommates" placeholder="please enter roommates">
            </div>
            <div class="form-group">
                <label for="id">shower</label>
                <input type="text" class="form-control" name="shower" placeholder="please enter shower">
            </div>
            <div class="form-group">
                <label for="id">smokingInside</label>
                <input type="text" class="form-control" name="smokingInside" placeholder="please enter smokingInside">
            </div>
            <div class="form-group">
                <label for="id">toilet</label>
                <input type="text" class="form-control" name="toilet" placeholder="please enter toilet">
            </div>
            <button type="submit" id='btn' class="btn btn-default">Add</button>
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
<script>
    // $(function () {
    //     $('#btn').click(function () {
    //         var form_obj = new FormData()
    //         form_obj.append('id', document.getElementById('id'))
    //         console.log(form_obj)
    //         alert(222)
    //         $.ajax({
    //             url: "/create",
    //             type: 'POST',
    //             data: form_obj,
    //             success:function (response) {
    //                 alert(2)
    //                 return 2
    //             },
    //         })
    //         return false
    //     })
    // })
</script>
</body>
</html>
