<h1>Stock Movement History</h1>

<table border="1" cellpadding="5">
    <tr>
        <th>Product</th>
        <th>Type</th>
        <th>Quantity</th>
        <th>Remarks</th>
        <th>Date</th>
    </tr>

    @foreach ($movements as $move)
        <tr>
            <td>{{ $move->product->name }}</td>
            <td>{{ strtoupper($move->type) }}</td>
            <td>{{ $move->quantity }}</td>
            <td>{{ $move->remarks }}</td>
            <td>{{ $move->created_at->format('Y-m-d H:i') }}</td>
        </tr>
    @endforeach
</table>
