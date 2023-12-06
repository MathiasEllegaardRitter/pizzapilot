<div>
    @if ($delivery == true && auth()->check())
        <h1> Delivery is ready to be delivered</h1>
    @elseif(!auth()->check() && $delivery == true)
        <h1>Guest or login</h1>
    @else
        <h1> Just an order summary</h1>
    @endif
</div>
