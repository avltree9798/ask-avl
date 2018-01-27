@include('user/header')
    <div>
        Username : <b>@{{ $user->getUsername() }}</b>
    </div>
    <div>
        <b>Answered Question : {{ count($user->getAnswers()) }}</b>
    </div>
	<div>
		<b>Asked Question : {{ count($user->getQuestions()) }}</b>
	</div>
	@if(Auth::user() && Auth::user()->getId() !== $user->getId())@
	<div>
		<form method="POST" action="{{ route('www.ask.question',[Auth::user()->getUsername(),$user->getUsername()]) }}">
			<div>
				Ask a question
			</div>
			<div>
				<textarea name="question"></textarea>
				<br>
				<input type="submit">
			</div>
		</form>
	</div>
	@endif@
    <div>
        @php($questions = $user->getQuestionsForMe())@
        @foreach($questions as $q)@
            <div>
				@if(!is_null($q->getAnswer()))@
					<div>{{ $q->getQuestion() }} - by <a href="{{ route('www.profile.index',[$q->getUser()->getUsername()]) }}">{{ $q->getUser()->getUsername() }}</a>
					<br/>
					</div>
					<div>
						<p>{{ $q->getAnswer()->getAnswer() }}</p>
					</div>
				@elseif(Auth::user()->getId() === $user->getId())@
					<div>{{ $q->getQuestion() }} - by <a href="{{ route('www.profile.index',[$q->getUser()->getUsername()]) }}">{{ $q->getUser()->getUsername() }}</a>
						<br/>
					</div>
					<div>
						<form method="POST" action="{{ route('www.answer.post',[$q->getUser()->getUsername()]) }}">
							{!! csrf_field() !!}
							<input type="hidden" name="question_id" value="{{ $q->getId() }}"/>
							<b>Your Answer</b>
							<textarea name="answer"></textarea>
							<br>
							<input type="submit">
						</form>
					</div>
				@endif@
            </div>
        @endforeach@
    </div>
@include('user/footer')