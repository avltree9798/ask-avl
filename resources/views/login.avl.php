<html>
    <head><title>Ask.AVL</title></head>
    <body>
        <form method="POST" action="{{ route('www.do.login') }}">
            {!! csrf_field() !!}
            <input name="username" placeholder="Username">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <input type="submit">
        </form>
    </body>
</html>