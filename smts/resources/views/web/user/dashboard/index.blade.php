<!doctype html>
<html lang="en">
<head>
    @include('layout.head')
</head>

<body>
@include('layout.js_scripts')
@include('layout.header_auth')
@include('web.user.dashboard.components.user_wallet')
@include('web.user.dashboard.components.wallet_js')
@include('web.user.dashboard.components.transfer_modal')
@include('layout.footer')
@include('layout.js_scripts')
</body>

</html>
