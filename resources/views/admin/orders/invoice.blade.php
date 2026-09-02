<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number ?? 'N/A' }} | Bilori</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; padding: 40px; color: #333; }
        .invoice-container { max-width: 800px; margin: 0 auto; border: 1px solid #ddd; padding: 30px; }
        .header { display: flex; justify-content: space-between; border-bottom: 2px solid #000; padding-bottom: 20px; margin-bottom: 20px; }
        .header h1 { font-size: 28px; }
        .company-info { text-align: right; font-size: 14px; }
        .invoice-info { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .invoice-info div { font-size: 14px; line-height: 1.6; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th { background: #f5f5f5; padding: 10px; text-align: left; border-bottom: 2px solid #000; font-size: 13px; }
        td { padding: 10px; border-bottom: 1px solid #eee; font-size: 13px; }
        .text-end { text-align: right; }
        .total-row { font-weight: bold; font-size: 16px; }
        .total-row td { border-top: 2px solid #000; padding-top: 15px; }
        .footer { margin-top: 40px; font-size: 12px; color: #888; text-align: center; border-top: 1px solid #ddd; padding-top: 15px; }
        .badge { display: inline-block; padding: 3px 10px; border-radius: 3px; font-size: 11px; font-weight: bold; }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-warning { background: #fff3cd; color: #856404; }
        @media print { body { padding: 0; } .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="invoice-container">
        
        <!-- Print Button -->
        <div class="no-print" style="text-align:right;margin-bottom:20px;">
            <button onclick="window.print()" style="padding:8px 20px;background:#000;color:#fff;border:none;border-radius:5px;cursor:pointer;">
                🖨️ Print Invoice
            </button>
            <button onclick="window.close()" style="padding:8px 20px;background:#666;color:#fff;border:none;border-radius:5px;cursor:pointer;margin-left:5px;">
                Close
            </button>
        </div>

        <!-- Header -->
        <div class="header">
            <div>
                <h1>INVOICE</h1>
                <p style="font-size:14px;color:#888;">Bilori Fashion</p>
            </div>
            <div class="company-info">
                <strong>Bilori</strong><br>
                Mumbai, Maharashtra<br>
                India<br>
                supportbilorifashion@gmail.com
            </div>
        </div>

        <!-- Invoice Info -->
        <div class="invoice-info">
            <div>
                <strong>Invoice To:</strong><br>
                {{ $order->name ?? 'N/A' }}<br>
                {{ $order->address ?? $order->shipping_address ?? 'N/A' }}<br>
                {{ $order->city ?? '' }}{{ ($order->city && $order->state) ? ', ' : '' }}{{ $order->state ?? '' }} - {{ $order->pincode ?? '' }}<br>
                Phone: {{ $order->phone ?? 'N/A' }}<br>
                Email: {{ $order->email ?? 'N/A' }}
            </div>
            <div style="text-align:right;">
                <strong>Invoice #:</strong> INV-{{ $order->order_number ?? 'N/A' }}<br>
                <strong>Order #:</strong> {{ $order->order_number ?? 'N/A' }}<br>
                <strong>Date:</strong> {{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}<br>
                <strong>Status:</strong> 
                <span class="badge badge-{{ ($order->status ?? '') == 'completed' ? 'success' : 'warning' }}">
                    {{ ucfirst($order->status ?? 'N/A') }}
                </span><br>
                <strong>Payment:</strong> {{ ucfirst($order->payment_status ?? 'N/A') }}
            </div>
        </div>

        <!-- Items Table -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Color/Size</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <strong>{{ $item->product_name ?? 'Product' }}</strong>
                        @if($item->product_sku)<br><small>SKU: {{ $item->product_sku }}</small>@endif
                        @if($item->bogo_enabled)<br><span class="badge badge-success">BOGO</span>@endif
                    </td>
                    <td>
                        @if($item->color){{ $item->color }}@endif
                        @if($item->size) / {{ $item->size }}@endif
                        @if(!$item->color && !$item->size)-@endif
                    </td>
                    <td>{{ $item->quantity ?? 1 }}</td>
                    <td>₹{{ number_format(($item->price ?? 0) + ($item->extra_price ?? 0), 2) }}</td>
                    <td class="text-end">₹{{ number_format($item->total ?? 0, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-end">Subtotal</td>
                    <td class="text-end">₹{{ number_format($order->subtotal ?? 0, 2) }}</td>
                </tr>
                @if(($order->bogo_discount ?? 0) > 0)
                <tr>
                    <td colspan="5" class="text-end" style="color:green;">BOGO Discount</td>
                    <td class="text-end" style="color:green;">-₹{{ number_format($order->bogo_discount, 2) }}</td>
                </tr>
                @endif
                @if(($order->coupon_discount ?? 0) > 0)
                <tr>
                    <td colspan="5" class="text-end" style="color:blue;">Coupon Discount</td>
                    <td class="text-end" style="color:blue;">-₹{{ number_format($order->coupon_discount, 2) }}</td>
                </tr>
                @endif
                @if(($order->shipping_cost ?? 0) > 0)
                <tr>
                    <td colspan="5" class="text-end">Shipping</td>
                    <td class="text-end">₹{{ number_format($order->shipping_cost, 2) }}</td>
                </tr>
                @else
                <tr>
                    <td colspan="5" class="text-end" style="color:green;">Shipping</td>
                    <td class="text-end" style="color:green;">FREE</td>
                </tr>
                @endif
                @if(($order->tax ?? 0) > 0)
                <tr>
                    <td colspan="5" class="text-end">GST (5%)</td>
                    <td class="text-end">₹{{ number_format($order->tax, 2) }}</td>
                </tr>
                @endif
                <tr class="total-row">
                    <td colspan="5" class="text-end" style="font-size:18px;">Total</td>
                    <td class="text-end" style="font-size:18px;">₹{{ number_format($order->total_amount ?? 0, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Notes -->
        @if($order->notes)
        <div style="margin-bottom:20px;padding:10px;background:#f9f9f9;border-radius:5px;">
            <strong>Notes:</strong> {{ $order->notes }}
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>This is a computer-generated invoice.</p>
        </div>

    </div>
</body>
</html>