@extends('layouts.app')

@section('content')
<div class="container">

    @if($bots)
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Token</th>
                        <th scope="col">Webhook</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bots as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td><a href="{{ url()->current() }}/edit/{{ $item->id }}">{{ $item->name }}</a></td>
                        <td>{{ $item->token }}</td>
                        <td>{{ $item->webhook_url ? 'Yes' : 'No' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @include('laravel-tgbot::form', ['bot' => null])

</div>
@endsection
