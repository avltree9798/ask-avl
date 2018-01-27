@include('user/header')
    <marquee>Wassup {{ Auth::user()->getUsername() }}</marquee>
    <b>Answered Question : {{ count(Auth::user()->getAnswers()) }}</b>
@include('user/footer')