<!-- The Modal -->
<div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content add_incharge col-md-8">
                <span class="close">&times;</span>
                
                    <form action="{{route('add_incharge')}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="inchargeName" class="form-label">Incharge Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="incharge">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        
                    </form>

            </div>

</div>