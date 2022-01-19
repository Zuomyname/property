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
    <div class="col-md-4">
        <img src="{{ $list->coverImageUrl ?? 'https://resources.kamernet.nl/Content/images/placeholder/no-pic-advert.png' }}" class="card-img" style="height:200px;width: 100%;margin: 10px">
        <img src="{{ $list->url ?? 'https://resources.kamernet.nl/Content/images/placeholder/no-pic-advert.png' }}" class="card-img" style="height:200px;width: 100%;margin: 10px">
        <img src="{{ $list->userPhotoUrl ?? 'https://resources.kamernet.nl/Content/images/placeholder/no-pic-advert.png' }}" class="card-img" style="height:200px;width: 100%;margin: 10px">
        <img src="{{ $list->coverImageUrl ?? 'https://resources.kamernet.nl/Content/images/placeholder/no-pic-advert.png' }}" class="card-img" style="height:200px;width: 100%;margin: 10px">
    </div>
    <div class="form col-md-8">
        <form action="/edit" method="post">
            <input name="_method" type="hidden" value="PUT">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="id">externalId</label>
                <input type="text" id="externalId" class="form-control" name="externalId"
                       value="{{ $list->externalId }}">
            </div>
            <div class="form-group">
                <label for="id">areaRaw</label>
                <input type="text" class="form-control" name="areaRaw" value={{ $list->areaRaw}}>
            </div>
            <div class="form-group">
                <label for="id">areaSqm</label>
                <input type="text" class="form-control" name="areaSqm" value={{ $list->areaSqm}}>
            </div>
            <div class="form-group">
                <label for="id">city</label>
                <input type="text" class="form-control" name="city" value={{ $list->city}}>
            </div>
            <div class="form-group">
                <label for="id">furnish</label>
                <input type="text" class="form-control" name="furnish" value={{ $list->furnish}}>
            </div>
            <div class="form-group">
                <label for="id">latitude</label>
                <input type="text" class="form-control" name="latitude" value={{ $list->latitude}}>
            </div>
            <div class="form-group">
                <label for="id">longitude</label>
                <input type="text" class="form-control" name="longitude" value={{ $list->longitude}}>
            </div>
            <div class="form-group">
                <label for="id">postalCode</label>
                <input type="text" class="form-control" name="postalCode" value={{ $list->postalCode}}>
            </div>
            <div class="form-group">
                <label for="id">postedAgo</label>
                <input type="text" class="form-control" name="postedAgo" value={{ $list->postedAgo}}>
            </div>
            <div class="form-group">
                <label for="id">propertyType</label>
                <input type="text" class="form-control" name="propertyType" value={{ $list->propertyType}}>
            </div>
            <div class="form-group">
                <label for="id">rawAvailability</label>
                <input type="text" class="form-control" name="rawAvailability" value={{ $list->rawAvailability}}>
            </div>
            <div class="form-group">
                <label for="id">rent</label>
                <input type="text" class="form-control" name="rent" value={{ $list->rent}}>
            </div>
            <div class="form-group">
                <label for="id">rentDetail</label>
                <input type="text" class="form-control" name="rentDetail" value={{ $list->rentDetail}}>
            </div>
            <div class="form-group">
                <label for="id">rentRaw</label>
                <input type="text" class="form-control" name="rentRaw" value={{ $list->rentRaw}}>
            </div>
            <div class="form-group">
                <label for="id">title</label>
                <input type="text" class="form-control" name="title" value={{ $list->title}}>
            </div>
            <div class="form-group">
                <label for="id">additionalCostsRaw</label>
                <input type="text" class="form-control" name="additionalCostsRaw" value={{ $list->additionalCostsRaw}}>
            </div>
            <div class="form-group">
                <label for="id">deposit</label>
                <input type="text" class="form-control" name="deposit" value={{ $list->deposit}}>
            </div>
            <div class="form-group">
                <label for="id">depositRaw</label>
                <input type="text" class="form-control" name="depositRaw" value={{ $list->depositRaw}}>
            </div>
            <div class="form-group">
                <label for="id">descriptionNonTranslated</label>
                <input type="text" class="form-control" name="descriptionNonTranslated" value={{ $list->descriptionNonTranslated}}>
            </div>
            <div class="form-group">
                <label for="id">descriptionTranslated</label>
                <input type="text" class="form-control" name="descriptionTranslated" value={{ $list->descriptionTranslated}}>
            </div>
            <div class="form-group">
                <label for="id">energyLabel</label>
                <input type="text" class="form-control" name="energyLabel" value={{ $list->energyLabel}}>
            </div>
            <div class="form-group">
                <label for="id">gender</label>
                <input type="text" class="form-control" name="gender" value={{ $list->gender}}>
            </div>
            <div class="form-group">
                <label for="id">internet</label>
                <input type="text" class="form-control" name="internet" value={{ $list->internet}}>
            </div>
            <div class="form-group">
                <label for="id">isRoomActive</label>
                <input type="text" class="form-control" name="isRoomActive" value={{ $list->isRoomActive}}>
            </div>
            <div class="form-group">
                <label for="id">kitchen</label>
                <input type="text" class="form-control" name="kitchen" value={{ $list->kitchen}}>
            </div>
            <div class="form-group">
                <label for="id">living</label>
                <input type="text" class="form-control" name="living" value={{ $list->living}}>
            </div>
            <div class="form-group">
                <label for="id">matchAge</label>
                <input type="text" class="form-control" name="matchAge" value={{ $list->matchAge}}>
            </div>
            <div class="form-group">
                <label for="id">matchCapacity</label>
                <input type="text" class="form-control" name="matchCapacity" value={{ $list->matchCapacity}}>
            </div>
            <div class="form-group">
                <label for="id">matchGender</label>
                <input type="text" class="form-control" name="matchGender" value={{ $list->matchGender}}>
            </div>
            <div class="form-group">
                <label for="id">matchLanguages</label>
                <input type="text" class="form-control" name="matchLanguages" value={{ $list->matchLanguages}}>
            </div>
            <div class="form-group">
                <label for="id">matchStatus</label>
                <input type="text" class="form-control" name="matchStatus" value={{ $list->matchStatus}}>
            </div>
            <div class="form-group">
                <label for="id">pageDescription</label>
                <input type="text" class="form-control" name="pageDescription" value={{ $list->pageDescription}}>
            </div>
            <div class="form-group">
                <label for="id">pageTitle</label>
                <input type="text" class="form-control" name="pageTitle" value={{ $list->pageTitle}}>
            </div>
            <div class="form-group">
                <label for="id">pets</label>
                <input type="text" class="form-control" name="pets" value={{ $list->pets}}>
            </div>
            <div class="form-group">
                <label for="id">registrationCostRaw</label>
                <input type="text" class="form-control" name="registrationCostRaw" value={{ $list->registrationCostRaw}}>
            </div>
            <div class="form-group">
                <label for="id">roommates</label>
                <input type="text" class="form-control" name="roommates" value={{ $list->roommates}}>
            </div>
            <div class="form-group">
                <label for="id">shower</label>
                <input type="text" class="form-control" name="shower" value={{ $list->shower}}>
            </div>
            <div class="form-group">
                <label for="id">smokingInside</label>
                <input type="text" class="form-control" name="smokingInside" value={{ $list->smokingInside}}>
            </div>
            <div class="form-group">
                <label for="id">toilet</label>
                <input type="text" class="form-control" name="toilet" value={{ $list->toilet}}>
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
