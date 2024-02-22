<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="POST" action="{{ route('customeradd') }}" >
        {{ csrf_field() }}
      <div class="modal-body">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder='Name'>
    </div>
    
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter a password">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
  </div>
</div>
