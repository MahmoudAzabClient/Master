@if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" style="text-align: center" role="alert">
            <strong>{{ session()->get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif