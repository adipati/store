@extends('layouts.app')

@section('content')
    <div class="container">
        <input type="text" class="form-control select2">
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('input.select2').select2()
            $('.select2').datepicker()
        });
    </script>
@endsection