
<div class="mt-5 box intro-x overflow-scroll">
<table class="table" style="border: 1px solid black; vertical-align: middle; text-align: center">
    <thead>
    <tr style="border: 1px solid black; vertical-align: middle; text-align: center">
        @foreach($keys as $item)
            <th style="border: 1px solid black; vertical-align: middle; text-align: center" class="whitespace-nowrap">
                @if(str_contains($item, 'client$'))
                    {{ str_replace('client$', '', $item) }}
                @elseif(str_contains($item, 'apartment$'))
                    {{ str_replace('apartment$', '', $item) }}
                @endif
            </th>
        @endforeach

    </tr>
    </thead>
    <tbody>

    @for($i = 0; $i < count($contract_array); $i++)
        <tr style="border: 1px solid black; vertical-align: middle; text-align: center">
            @foreach($keys as $item)
                <td>{{ $contract_array[$i][explode('$', $item)[0]][explode('$', $item)[1]] }}</td>
            @endforeach
        </tr>
    @endfor


    {{--<tr>
        <td>1</td>
        <td>Angelina</td>
        <td>Jolie</td>
        <td>@angelinajolie</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Brad</td>
        <td>Pitt</td>
        <td>@bradpitt</td>
    </tr>
    <tr>
        <td>3</td>
        <td>Charlie</td>
        <td>Hunnam</td>
        <td>@charliehunnam</td>
    </tr>--}}
    </tbody>
</table>
</div>
