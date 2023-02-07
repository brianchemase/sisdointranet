<!-- start service Modal -->
<div class="modal fade" id="approveloanmodal{{$data->loan_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Loan Approval for loan ID:{{$data->loan_id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="#" autocomplete="off">
                @csrf
                <h4 class="text-center">You are about to Approve Loan number: {{$data->loan_id}} </h4>
                <h5 >Name: {{$data->first_name}} {{$data->last_name}}</h5>
                <h5 >Phone: {{$data->loan_id}}</h5>
                <h5 >ID Number: {{$data->loan_id}}</h5>
                <h5 >Loan Amount: {{number_format($data->loan_applied)}}</h5>
                <div class="form-group">
                 
                  
                  
                  <input type="hidden" name="phone" value="{{$data->loan_id}}">
                  <input type="hidden" name="idnumber" value="{{$data->loan_id}}">
                  <input type="hidden" name="firstname" value="{{$data->loan_id}}">
                  <input type="hidden" name="lastname" value="{{$data->loan_id}}">
                  <input class="form-control form-control-lg" type="text" name="comment" placeholder="Enter Your Comment">
                    <br>
                  <div class="form-group">
                    <label for="applicationdate">Approval Date</label>
                    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Application Date">
                </div>

                  <!-- <small id="emailHelp" class="form-text text-muted">Click on start Service to begin serving.</small> -->
                </div>   
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="save" class="btn btn-primary">Approve Loan</button>
        </div>
      </div>
    </form>
    </div>
  </div>



  <!-- start service Modal -->
<div class="modal fade" id="loanrejectionmodal{{$data->loan_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Decline Loan ID:{{$data->loan_id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="#" autocomplete="off">
                @csrf
                <h4 class="text-center">You are about to Decline Loan number: {{$data->loan_id}} </h4>
                <h5 >Name: {{$data->first_name}} {{$data->last_name}}</h5>
                <h5 >Phone: {{$data->loan_id}}</h5>
                <h5 >ID Number: {{$data->loan_id}}</h5>
                <h5 >Loan Amount: {{number_format($data->loan_applied)}}</h5>
                <div class="form-group">
                 
                  
                  
                  <input type="hidden" name="phone" value="{{$data->loan_id}}">
                  <input type="hidden" name="idnumber" value="{{$data->loan_id}}">
                  <input type="hidden" name="firstname" value="{{$data->loan_id}}">
                  <input type="hidden" name="lastname" value="{{$data->loan_id}}">
                  <input class="form-control form-control-lg" type="text" name="comment" placeholder="Enter Your Comment">
                    <br>
                  <div class="form-group">
                    <label for="applicationdate">Approval Date</label>
                    <input type="date" class="form-control" id="formGroupExampleInput" placeholder="Application Date">
                </div>

                  <!-- <small id="emailHelp" class="form-text text-muted">Click on start Service to begin serving.</small> -->
                </div>   
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" name="save" class="btn btn-primary">Decline Loan</button>
        </div>
      </div>
    </form>
    </div>
  </div>

