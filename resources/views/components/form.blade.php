<div class="form-row d-flex">
    <div class="col">Ready to use</div>
    <div class="col">Name of file</div>
    <div class="col">Start date</div>
    <div class="col">End date</div>
</div>
<form action="{{ route('submit-form') }}" method="POST">
@foreach($files as $file)
        @csrf
        <div class="form-row d-flex">
            <div class="col">
                <input type="checkbox" class="align-items-center justify-content-center h-100" id="checkbox" name="{{$file->name}}checkbox" value="1" {{ $file->active ? 'checked' : '' }}>
            </div>
            <div class="col">
                <input type="text" id="name" name="name" value="{{ $file->name }}" class="form-control">
            </div>
            <div class="col">
                <input type="date" id="start_date" value="{{ $file->from }}" name="start_date" class="form-control">
            </div>
            <div class="col">
                <input type="date" id="end_date" value="{{ $file->to }}" name="end_date" class="form-control">
            </div>
        </div>
@endforeach
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>