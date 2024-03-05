<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $setting->translate(app()->getlocale())->content }}">
    <meta name="keyword" content="{{ $setting->translate(app()->getlocale())->title }}">
    <link rel="shortcut icon" href="{{ asset('storage/'.$setting->favicon) }}">
    <title>{{ $setting->translate(app()->getlocale())->title }}</title>
    <!-- Icons -->
    <link href="{{asset('BackendAssets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('BackendAssets/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('BackendAssets/dest/style.css')}}" rel="stylesheet">
</head>
