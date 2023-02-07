  <!-- view Modal -->
  <div class="modal fade" id="viewModal{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Showing Client no: {{$client->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h4 class="text-center"><img src="{{ url('storage/ppts/'.$client->passport) }}"  style="height: 400px; width: 350px;"> </h4>
            <h4 class="text-center">Client number: {{$client->id}} </h4>
            <h5 >Name: {{$client->first_name}} {{$client->last_name}}</h5>
            <h5 >ID Number: {{$client->id_number}}</h5>
            <h5 >Phone: {{$client->phone}}</h5>
            <h5 >Gender: {{$client->gender}}</h5> 
            <h5 >Station: {{$client->location}}</h5>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>