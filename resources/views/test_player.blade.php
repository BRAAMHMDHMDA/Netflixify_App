<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div class="w-50" style="height: 500px">
    <div id="play" style="height: 100%; width: 100%"></div>
</div>
<script src="{{asset('website_assets/js/playerjs.js')}}" type="text/javascript"></script>
<script>
    var file =
        "[Auto]{{ Storage::url('media/movies/Avatar/Avatar.m3u8') }}," +
        "[360]{{ Storage::url('media/movies/Avatar/Avatar_0_250.m3u8') }}," +
        "[480]{{ Storage::url('media/movies/Avatar/Avatar_1_500.m3u8') }}," +
        "[720]{{ Storage::url('media/movies/Avatar/Avatar_2_1000.m3u8') }}";

    var player = new Playerjs({
        id:"play",
        file:file,
        poster: "{{asset('website_assets/images/iron_land.jpg')}}",
        default_quality: "360",
    });
</script>

</body>
</html>
