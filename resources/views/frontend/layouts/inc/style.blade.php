<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{@$seoSetting->description}}">
<meta name="keywords" content="{{@$seoSetting->keywords}}">
<title>{{@$seoSetting->title}}</title>
<link rel="icon" type="image/svg+xml" href="{{ asset('frontend/assets/images/favicon.svg') }}" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/normalize.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/style-plugin-collection.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/custom.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
