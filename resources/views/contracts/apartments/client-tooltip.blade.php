<table>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$client->firstname}}</td>
            <td>{{$client->name}}</td>
            <td>{{$client->fathersname}}</td>
            <td>{{$client->passportId}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
