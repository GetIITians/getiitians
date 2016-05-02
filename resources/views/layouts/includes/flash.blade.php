@if (session()->has('flashMessage'))
  <span id="flashMessage">{{ session('flashMessage') }}</span>
@endif
