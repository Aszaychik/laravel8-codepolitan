@extends('layouts.app')

@section('main')
<div class="mt-5 mx-auto" style="width: 380px">
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/tasks')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">User</label>
                    <input name="user" type="text" class="form-control">
                    @error('user')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Task</label>
                    <textarea name="task" class="form-control" id="" rows="3"></textarea>
                    @error('task')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
