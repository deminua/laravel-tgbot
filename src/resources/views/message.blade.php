✅✅✅ {{ $data['title'] ?? '' }}

Name: <b>{{ $data['name'] ?? '' }}</b>
Email: <b>{{ $data['email'] ?? '' }}</b>
Phone: <b>{{ $data['phone'] ?? '' }}</b>
Product: <b>{{ $data['product'] ?? '' }}</b>

<pre>{{ $data['comment'] ?? '' }}</pre>

{{ urldecode($data['url'] ?? '') }}
