<div id="print-area">
    <table class="table table-hover table-bordered">

        <thead>
            <tr>
                <th>@lang('site.name')</th>
                <th>@lang('site.quantity')</th>
                <th>@lang('site.price')</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->sale_price * $product->pivot->quantity , 2) }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <h3>@lang('site.total') <span>{{ number_format($order->total_price, 2) }}</span></h3>
</div>
<button class="btn btn-primary print-btn" style="width: 100%" > @lang('site.print')</button>