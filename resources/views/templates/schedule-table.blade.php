<table style="border: 0.41rem solid black; vertical-align: text-top; font-size: 1rem; font-weight: bold">
    <thead>
    <tr>
        <th style="vertical-align: middle; text-align: center">№ п/п</th>
        <th style="vertical-align: middle; text-align: center">Дата внесения денежных средств</th>
        <th style="vertical-align: middle; text-align: center">Сумма денежных средств, подлежащая внесению ({{ $currency === 'KGS' ? 'Сомах' : 'Долларах' }})</th>
        <th style="vertical-align: middle; text-align: center">Оплачено</th>
    </tr>
    </thead>
    <tbody>

    @foreach($schedule as $key => $item)

        @if($item->status === 'Перв.взнос')
            <tr style="height: 1.2cm">
                <td style="vertical-align: middle; text-align: center"></td>
                <td style="vertical-align: middle; text-align: center; width: 30%">Перв.взнос</td>
                <td style="vertical-align: middle; text-align: center; width: 30%">{{ number_format($item->amount, 0, '.', ' ') }} {{ $currency === 'KGS' ? 'сом' : '$' }}</td>
                <td style="vertical-align: middle; text-align: center; width: 40%"></td>
            </tr>
        @else
        <tr style="height: 1.2cm">
            <td style="vertical-align: middle; text-align: center">{{ $key }}</td>
            <td style="vertical-align: middle; text-align: center; width: 30%">{{ date("d.m.Y", strtotime($item->date_of_payment)) }}</td>
            <td style="vertical-align: middle; text-align: center; width: 30%">{{ number_format($item->amount, 0, '.', ' ') }} {{ $currency === 'KGS' ? 'сом' : '$' }}</td>
            <td style="vertical-align: middle; text-align: center; width: 40%"></td>
        </tr>
        @endif
    @endforeach
    <tr style="height: 36px">
        <td style="vertical-align: middle; text-align: center"></td>
        <td style="vertical-align: middle; text-align: center; width: 30%">Итого: </td>
        <td style="vertical-align: middle; text-align: center; width: 30%">{{ number_format($schedule->pluck('amount')->sum(), 0, '.', ' ') }} {{ $currency === 'KGS' ? 'сом' : '$' }}</td>
        <td style="vertical-align: middle; text-align: center; width: 40%"></td>
    </tr>
    </tbody>
</table>
