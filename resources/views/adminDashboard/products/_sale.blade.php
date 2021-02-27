<div id="change-sale-form">
    <form action="put" action="{{ route('adminDashboard.products.change_sale',$product) }}">
        <input type="number" name="sale" placeholder="10">
        <a type="submit">change sale</a>
    </form>
    
</div>