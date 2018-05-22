@extends('layouts.lte')

@section('content')
<section class="content">
    <button id="add-field" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i></button>

    <form class="form" action="">
        <input type="text" name="name" class="form-control">
    </form>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#add-field').click(function() {
            $('.form').append('<div class="field">'
                +'<input type="text" name="name" class="form-control">'
                +'<button type="button" class="remove btn btn-sm"><i class="fa fa-close"></i></button>'
                +'</div>')
        })

        $('.content').on('click', '.remove', function() {
            $(this).closest('.field').remove()
        })
    })
</script>
@endsection