@component('mail::message')
<h2> New Update For This Ticket! </h2>

<h3> Ticket Details: </h3>

<p>Ticket Owner: {{ $ticketupdate['ticket_user'] }}</p>
<p>Ticket Title: {{ $ticketupdate['ticket_title'] }} </p>
<p>Ticket Description: {{ $ticketupdate['ticket_desc'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
