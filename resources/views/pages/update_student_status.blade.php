@extends('layout.master')
@section('title')
	Edit Status
@endsection
@section('content')
	<div class="container">
		<div class="col-md-8 offset-md-2">
			<h4>Edit Task</h4>

			<form action="{{route('update', $task->id)}}" method="post">
				@csrf
				@method('post')
				<div class="form-group">
					<label class="form-label">Task</label>
					<input type="text" value="{{$task->task_column}}" class="form-control" name="task_input" required placeholder="Enter task here">
					<input type="submit" class="mt-2 btn btn-success" value="Update" name="">
				</div>			
			</form>
		</div>
	</div>

@endsection