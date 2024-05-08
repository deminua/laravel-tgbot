@extends('layouts.app')

@section('content')
<div class="container">

    @include('laravel-tgbot::form', ['bot' => $bot])

    <div class="row justify-content-center">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="col-12 mb-4">
            <h2>Clients {{ $bot->name }}</h2>
            <table class="table table-hover">
                <thead>
                    <th scope="col">id</th>
                    <th scope="col">test</th>
                    <th scope="col">is_bot</th>
                    <th scope="col">first_name</th>
                    <th scope="col">username</th>
                    <th scope="col">language_code</th>
                    <th scope="col">date</th>
                    <th scope="col">delete</th>
                </thead>
                <tbody>
                    @foreach($bot->clients as $client )
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td><a href="{{ url()->current() }}/test_client/{{ $client->id }}" class="btn btn-sm btn-outline-warning py-0 px-2">send</a></td>
                        <td>{{ $client->is_bot ? 'Yes' : "No" }}</td>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->username }}</td>
                        <td>{{ $client->language_code }}</td>
                        <td>{{ $client->created_at->format('Y-m-d H:i:s') }}</td>
                        <td><a href="{{ url()->current() }}/delete_client/{{ $client->id }}" class="btn btn-sm btn-outline-danger py-0 px-2">-</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @if(!$telegram->getWebhookInfo()->url)
        <div class="col-12 mb-4">
            <h2>getUpdates</h2>
            <table class="table table-hover">
                <thead>
                    <th scope="col"></th>
                    <th scope="col">id</th>
                    <th scope="col">first_name</th>
                    <th scope="col">username</th>
                    <th scope="col">type</th>
                    <th scope="col">add</th>
                </thead>
                <tbody>
                    @foreach($telegram->getUpdates() as $values)
                    @foreach($values as $key => $value)
                    @if($key != 'update_id')
                    <tr>

                        <td><pre>{{ print_r($value, true) }}</pre></td>
                        <td>{{ $value['chat']['id'] ?? '-' }}</td>
                        <td>{{ $value['chat']['first_name'] ?? $value['chat']['title'] }}</td>
                        <td>{{ $value['chat']['username'] ?? '-' }}</td>
                        <td>{{ $value['chat']['type'] ?? '-' }}</td>
                        <td>
                            <form method="POST" action="{{ url()->current() }}/new_client">
                                @csrf
                                <input name="from" type="hidden" value="{{ json_encode($value['chat']['id']) }}">
                                <button type="submit" class="btn btn-sm btn-outline-secondary py-0 px-2">+</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="col-6">
            <h2>getWebhookInfo</h2>
            <table class="table table-hover">
                <tbody>
                    @foreach($telegram->getWebhookInfo() as $key => $value )
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $value }}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <h2>getMe</h2>
            <table class="table table-hover">
                <tbody>
                    @foreach($telegram->getMe() as $key => $value )
                    <tr>
                        <th scope="row">{{ $key }}</th>
                        <td>{{ $value }}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
