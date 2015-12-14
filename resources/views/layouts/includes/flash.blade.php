@if (session()->has('flashMessage'))
    <div class="alert alert-red alert-dismissible fade in" role="alert">
        <i class="material-icons">error</i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <p>{{ session('flashMessage') }}</p>
    </div>
@endif