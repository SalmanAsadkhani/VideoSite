<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="is-auth" content="{{ auth()->check() ? 'true' : 'false' }}">

    <title>Video Online </title>

    {{--    fonts--}}
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.cdnfonts.com/css/iranian-sans" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/tahoma" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
