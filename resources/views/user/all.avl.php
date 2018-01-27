@include('user/header')
@foreach($users as $user)@
<p><a href="{{ route('www.profile.index',[$user->getUsername()]) }}">{{ $user->getUsername() }}</a></p>
@endforeach@
@include('user/footer')