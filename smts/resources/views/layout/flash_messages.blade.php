@if ($message = Session::get('success'))
    <script>
        M.toast({html: '{{$message}}' })
    </script>
@endif

@if ($errors = Session::get('error'))
    @foreach($errors as $error)
        <script>
            M.toast({html: '{{current($error)}}' })
        </script>
    @endforeach
@endif
