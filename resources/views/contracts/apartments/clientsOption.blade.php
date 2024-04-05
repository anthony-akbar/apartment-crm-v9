@foreach($clients as $client)
    <div data-selectable="" data-value="{{ $client->id }}" class="option selected active" role="option" id="client_id-opt-{{ $client->id }}" aria-selected="true">{{ $client->firstname }} {{ $client->name }} <span
            class="text-opacity-70">{{ $client->passportId }}</span></div>
@endforeach
