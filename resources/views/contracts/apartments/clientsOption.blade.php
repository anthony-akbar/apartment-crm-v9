@foreach($clients as $client)
    <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->name }} <span
            class="text-opacity-70">{{ $client->passportId }}</span></option>
@endforeach
