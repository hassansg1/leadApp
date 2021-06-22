@if (Session::has('message'))
    <div style="    font-size: 17px;
    color: red;" class="alert alert-info">{{ Session::get('message') }}</div>
@endif
