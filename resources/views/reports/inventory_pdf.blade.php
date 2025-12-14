<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inventory Report</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; margin: 20px; }
        h1, h2 { text-align: center; margin: 0; }
        h1 { font-size: 18px; margin-bottom: 5px; }
        h2 { font-size: 16px; margin-bottom: 5px; }
        p.date { text-align: center; font-size: 11px; margin-top: 0; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f5f5f5; }
        .low-stock { background-color: #f8d7da; } /* red highlight for low stock */
        .grand-total { font-weight: bold; background-color: #e2e3e5; }
    </style>
</head>
<body>
    <!-- Company Name -->
    <h1>Pioneer Furnitures</h1>

    <!-- Report Title -->
    <h2>Inventory Report</h2>

    <!-- Date -->
    <p class="date">Generated on: {{ \Carbon\Carbon::now()->format('F j, Y, g:i A') }}</p>

    <!-- Inventory Table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Stock Quantity</th>
                <th>Total Value</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach ($products as $product)
                @php
                    $totalValue = $product->price * $product->quantity;
                    $grandTotal += $totalValue;
                    $lowStock = $product->quantity <= $product->low_stock_level;
                @endphp
                <tr class="{{ $lowStock ? 'low-stock' : '' }}">
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>₱{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>₱{{ number_format($totalValue, 2) }}</td>
                </tr>
            @endforeach
            <tr class="grand-total">
                <td colspan="6" style="text-align: center;">Total Inventory Value</td>
                <td>₱{{ number_format($grandTotal, 2) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
