<div class="form-row d-flex">
    <div class="col">{{__('normal.teacher-page-tab1-col1')}}</div>
    <div class="col">{{__('normal.teacher-page-tab1-col2')}}</div>
</div>
<form action="{{ route('submit-form') }}" method="POST">
@foreach($files as $file)
        @csrf
        <div class="form-row d-flex">
            <div class="col">
                <input type="checkbox" class="align-items-center justify-content-center h-100" id="checkbox" name="{{ $file->name }}checkbox" value="1" {{ $file->active ? 'checked' : '' }}>
            </div>
            <div class="col">
                <input type="text" id="name" name="name" value="{{ $file->name }}" class="form-control">
            </div>
        </div>
@endforeach
    <div class="form-row d-flex">
        <div class="col">{{__('normal.teacher-page-tab1-col3')}}</div>
        <div class="col">{{__('normal.teacher-page-tab1-col4')}}</div>
        <div class="col">{{__('normal.teacher-page-tab1-col5')}}</div>
    </div>
    <div class="form-row d-flex">
        <div class="col">
            <input type="date" id="start_date" value="{{ $file->from }}" name="start_date" class="form-control">
        </div>
        <div class="col">
            <input type="date" id="end_date" value="{{ $file->to }}" name="end_date" class="form-control">
        </div>
        <div class="col">
            <input type="number" id="pointsPerFile" name="pointPerFile" value="{{ $file->points }}" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">{{__('normal.teacher-page-btn1')}}</button>
</form>