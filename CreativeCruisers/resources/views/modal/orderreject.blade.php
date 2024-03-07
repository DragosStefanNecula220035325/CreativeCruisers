<form method="POST" action="{{ url('processed/'.$order->id) }}" >
            {{ csrf_field() }}
            @method('PUT')
    <div class="modal fade" id="Cancel{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label>ID</label>
            <input type="text" name="id" id="id" class="form-control" placeholder='Name' value="{{ $order->id }}">
        </div>

        <div class="form-group">
            <label>Product ID</label>
            <input type="text" name="product_id" id="product_id" class="form-control" placeholder='Name' value="{{ $order->product_id }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" id="status" class="form-control" value="Cancelled">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
        </div>
    </div>
    </div>