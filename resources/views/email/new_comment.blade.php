@component('mail::message')

<h2> New Comment On Your Ticket! </h2>

<h3> Comment Details: </h3>

<h3>Commentor:</h3>
<p>{{ $commentdata['comment_user'] }}</p>

<h3>Comment:</h3>
<p>{{ $commentdata['comment_body'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
