@extends('layouts.backend.master')

@section('title', 'Stuff List')

@section('css')
<link rel="stylesheet" href="{{ asset('css/vendor/DataTable-1.10.20/datatables.min.css') }}">
@endsection

@section('content')
<div class="page-body p-4 text-dark">
    <div class="page-heading border-bottom d-flex flex-row">
        <h5 class="font-weight-normal">Dashboard | </h5>
        <small class="mt-2 ml-2">Stuff List</small>
    </div>

    <!-- Responsive Data Table example -->
    <div class="card mt-4 rounded-lg">
        <!-- Card body -->
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-title">Edit Stuff List</div>
            </div>
            <form action="{{ route('aboutus.stuffList.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$stuffList->id}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="custom-file mb-3">
                                <input type="file" name="image" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose Stuff List File</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_en">Title (en)</label>
                                <textarea class="form-control" id="description_en" rows="4"
                                    name="description_en"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description_bn">Title (bn)</label>
                                <textarea class="form-control" id="description_bn" rows="4"
                                    name="description_bn"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        initSummernote($('#description_en'));
        initSummernote($('#description_bn'));

        $('#description_en').summernote("code", {!! json_encode($stuffList->description_en) !!});
        $('#description_bn').summernote("code", {!! json_encode($stuffList->description_bn) !!});
    })

    function initSummernote(el){
        $(el).summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear','fontsize']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
            ],
            fontSizes: ['12', '14', '16','18', '24', '36', '48' , '64', '82', '150'],
            fontNames: ['Ubuntu'],
            height:"100"
        })
    }
</script>
@endpush