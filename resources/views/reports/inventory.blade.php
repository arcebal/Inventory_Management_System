<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pionere Furnitures Inventory Report</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>

<h1>Pionere Furnitures Inventory Report</h1>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>₱{{ number_format($product->price, 2) }}</td>
                <td>
                    {{ $product->isLowStock() ? 'LOW STOCK' : 'OK' }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
