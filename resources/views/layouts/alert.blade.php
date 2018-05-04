@if (count($errors) > 0)
<div class="alert alert-warning alert-block" style="font-size:14px">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4><i class="fa fa-bell-alt"></i>Terjadi kesalahan!</h4>
    <p><ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul></p>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-block" style="font-size:14px;text-align:center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="fa fa-bell-alt"></i>{{Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-block" style="font-size:14px;text-align:center">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="fa fa-bell-alt"></i>{{Session::get('error')}}
</div>
@endif