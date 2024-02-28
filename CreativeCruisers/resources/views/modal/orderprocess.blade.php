<form method="POST" action="{{ route('orderprocess') }}" >
            {{ csrf_field() }}
    <div class="modal fade" id="Process{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

        <div class="form-group">
            <label>OrderID</label>
            <input type="text" name="order_id" id="order_id" class="form-control" placeholder='Name' value="{{ $order->id }}">
        </div>
        
        <div class="form-group">
            <label>Image</label>
            <img src="/products/{{$order->product_id}}.png" alt="Placeholder" height=50 width=50>
        </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" id="name" class="form-control" placeholder='Name' value="{{ $order->name }}">
        </div>

        <div class="form-group">
            <label>Country</label>
            <input type="text" name="billing_country" id="billing_country" class="form-control" value="{{ $order->billing_country }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <input type="text" name="billing_address" id="billing_address" class="form-control"  value="{{ $order->billing_address }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="billing_email" id="billing_email" class="form-control" value="{{ $order->billing_email }}">
        </div>

        <div class="form-group">
            <label>Total</label>
            <input type="text" name="billing_total" id="billing_total" class="form-control"  value="{{ $order->billing_total }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="Processed">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
        </div>
    </div>
    </div>