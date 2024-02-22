<form method="POST" action="{{ url('admin_customerdetails/'.$user->id) }}" >
            {{ csrf_field() }}
            @method('PUT')
    <div class="modal fade" id="Edit{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder='Name' value="{{ $user->name }}">
        </div>
        
        <div class="form-group">
            <label>Email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $user->email }}">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
        </div>
    </div>
    </div>