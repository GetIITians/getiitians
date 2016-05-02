@if (count($errors) > 0)
        <!-- Form Error List -->
<div class="row">
  <div class="col-xs-offset-2 col-xs-8">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
@endif
