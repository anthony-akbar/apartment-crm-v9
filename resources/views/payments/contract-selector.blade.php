<label class="form-label">Договор</label>
<div class="mt-2 w-full">
    <select name="contract_id" id="contract_id" onchange="onContractChange()" class="form-control tom-select">
        @foreach($contracts as $key => $contract)
            <option {{ $key === 0 ? 'selected="true"' : '' }} value="{{ $contract->id }}">
                <a href="" class="underline decoration-dotted font-medium whitespace-nowrap">№{{ $contract->id }} {{ $contract->client->firstname }} {{ $contract->client->name }}</a>
                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">AN4063060</div>
            </option>
        @endforeach
    </select>
</div>
