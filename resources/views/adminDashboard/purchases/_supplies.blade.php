<div class="mb-2">
    <h3 class="card-title"><strong>@lang('site.supplies-number')</strong> <small>{{ $supplies->count() }}</small></h3>
</div>
<div id="print-area">
    
    <table class="table table-hover table-bordered">

        <thead>
            <tr>
                <th>@lang('site.name')</th>
                <th>@lang('site.color')</th>
                <th>@lang('site.quantity')</th>
                <th>@lang('site.price')</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($supplies as $supply)
                <tr>
                    <td>{{ $supply->name }}</td>
                    <td>{{ $supply->color }}</td>
                    <td>{{ $supply->pivot->quantity }}</td>
                    <td>{{ number_format($supply->purchase_price * $supply->pivot->quantity , 2) }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <h3>@lang('site.total') <span>{{ number_format($purchase->total_price, 2) }}</span></h3>
</div>
<button class="btn btn-primary print-btn" style="width: 100%" > @lang('site.print')</button>