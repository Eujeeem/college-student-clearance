<!-- The Modal -->
<div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content add_department">
                <span class="close">&times;</span>
                
                    <form action="{{route('edit_notes', $lists->id)}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="notes">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>

        </div>