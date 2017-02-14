<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Administer</title>
    
    {{-- Styles --}}
    <link rel="stylesheet" type="text/css" href="/administer_assets/css/app.css">
</head>
<body>
    <div class="container">
        @include('administer::layouts.navbar')

        <main>
            @yield('content')
        </main>
    </div>
    
    {{-- Scripts --}}
    <script src="/administer_assets/js/app.js"></script>
</body>
</html>