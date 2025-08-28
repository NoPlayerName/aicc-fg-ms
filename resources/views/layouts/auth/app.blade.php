<!doctype html>
<html lang="en">

<head>
    <title>{{ $title ?? 'Packing Palet' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    @include('components.head')

</head>

<body class="auth-body-bg">
    {{ $slot }}
    @include('components.scripts')
</body>

</html>
