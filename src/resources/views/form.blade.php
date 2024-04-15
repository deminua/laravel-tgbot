<form class="row" method="POST">
    @csrf

    <h1>{{ $bot ? $bot->name : 'Create new bot' }}</h1>

    <div class="col-12 col-md-6 mb-3">
        <label for="bot_name" class="form-label">Bot name *</label>
        <input value="{{ $bot->name ?? '' }}" required type="text" class="form-control" id="bot_name" name="name" placeholder="My bot">
    </div>
    <div class="col-12 col-md-6 mb-3">
        <label for="bot_token" class="form-label">Token *</label>
        <input value="{{ $bot->token ?? '' }}" required type="text" class="form-control" id="bot_token" name="token" placeholder="Example: 1234567890:ABC-d1ef2k3bH1dTZxXgQ4pSR0gXTBERgDI">
    </div>
    <div class="col-12 col-md-6 mb-3">
        <label for="certificate_path" class="form-label">Certificate path (in developing)</label>
        <input disabled type="text" class="form-control" id="certificate_path" name="certificate_path" placeholder="Certificate path">
    </div>
    <div class="col-12 col-md-6 mb-3">
        <label for="webhook_url" class="form-label">Webhook url</label>
        <input value="{{ $bot->webhook_url ?? '' }}" type="text" class="form-control" id="webhook_url" name="webhook_url" placeholder="https://my.domain/link/other">
    </div>
    <div class="col text-end">
        <button type="submit" class="btn btn-primary mb-3">{{ $bot ? 'Update bot' : 'Create new bot' }}</button>
    </div>
</form>
