<p>Hello Admin,</p>

<p>A new query has been submitted by <strong>{{ $user->name }}</strong> (Email: {{ $user->email }}):</p>

<p><strong>Query:</strong> {{ $query->query }}</p>

<p>Sent on: {{ \Carbon\Carbon::parse($query->sended_at)->toDayDateTimeString() }}</p>

<p>Regards,<br>Your Job Portal</p>
