<html>
    <head>
        <title>Welcome home {{ Auth::user()->getUsername() }}</title>
    </head>
    <body>
		<a href="{{ route('www.logout') }}">Logout</a>
		<a href="{{ route('www.profile.index',[Auth::user()->getUsername()]) }}">My Profile</a>
		<a href="{{ route('www.profile.all') }}">All users</a>