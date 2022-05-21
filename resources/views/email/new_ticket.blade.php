@component('mail::message')

<h2> New Ticket Created! </h2>

<h3> Ticket Details: </h3>

<p>Ticket Owner: {{ $data['ticket_user'] }}</p>
<p>Ticket Title: {{ $data['ticket_title'] }} </p>
<p>Ticket Description: {{ $data['ticket_desc'] }}</p>

@component('mail::button', ['url' => 'http://localhost:8000/ticket/view/open'])
View Open Ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
