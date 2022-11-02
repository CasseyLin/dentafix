@if(count($reservations) >0)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="{{'prescription'}}" method="post">@csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body" id="app">
          <input type="hidden" name="user_id" value="{{$reservation->user_id}}">
          <input type="hidden" name="dentist_id" value="{{$reservation->dentist_id}}">
          <input type="hidden" name="date" value="{{$reservation->date}}">
          <label>{{$reservation->date}}</label>
          <br>

          <div class="form-group">
            <label>Service</label>
            <input type="text" name="name_of_service" class="form-control" placeholder="Service" required="">
          </div>

          <div class="form-group">
            <label>Medicine</label>
            <add-button></add-button>
          </div>

          <div class="form-group">
            <label>Instructions to use</label>
            <textarea name="instructions_to_use" class="form-control" placeholder="Instructions to use"></textarea>
          </div>

          <div class="form-group">
            <label>Things to note</label>
            <textarea name="note" class="form-control" placeholder="Please take note" required=""></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      </form>
    </div>
  </div>
@endif