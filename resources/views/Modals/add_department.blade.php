<!-- The Modal -->
<div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content add_department col-md-8">
                <span class="close">&times;</span>
                
                    <form action="{{route('add_department')}}" method="post">
                    @csrf
                        <div class="mb-3">
                        <label for="DepartmentName" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="department">
                        </div>

                        <div class="mb-3">
                        <label for="inchargename" class="form-label">Incharge</label>
                            <select name="incharge" class="form-control">
                                <option value="">--None--</option>
                                @foreach($incharge as $shows)
                                <option value="{{$shows->id}}">{{$shows->incharge_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>

        </div>