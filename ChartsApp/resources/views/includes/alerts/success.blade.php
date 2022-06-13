 @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show align-content-center" style="text-align: center" role="alert">
            <strong style="align-content: center">{{ session()->get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif