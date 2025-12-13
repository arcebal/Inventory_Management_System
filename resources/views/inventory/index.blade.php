<h1>Inventory Summary</h1>

<p>Total Products: {{ $totalProducts }}</p>

<h3>Low Stock Products</h3>

<ul>
@foreach ($lowStockProducts as $product)
    <li>
        {{ $product->name }} — Qty: {{ $product->quantity }}
    </li>
@endforeach
</ul>
