@extends('layouts.app')

@section('main')
<div class="border rounded my-5 mx-auto d-flex flex-column align-items-stretch bg-white text-capitalize" style="width: 380px;">
    <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
        <span class="fs-5 fw-semibold">Task Lists : {{ $data->total()}}</span>
        <a href="{{ url('/tasks/create') }}" class="btn btn-sm btn-primary">add</a>
    </div>
    @foreach ($data as $item)
    <div class="list-group list-group-flush border-bottom scrollarea">
        <div class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <strong class="mb-1">{{ $item->task }}</strong>
                <small>{{ $item->created_at}}</small>
            </div>
            <div class="col-10 mb-1 small">{{ $item->user }}</div>
            <form action="{{ url("/tasks/$item->id")}}" method='POST' class="group-action">
                @csrf
                @method('DELETE')
                <a href="{{ url("/tasks/$item->id/edit") }}" class="badge bg-info text-white">edit</a>
                <button type="submit" class="badge bg-danger btn text-white">delete</button>
            </form>
        </div>
    </div>
    @endforeach
    <br>
    <div class="mx-auto">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
