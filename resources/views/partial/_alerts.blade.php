@if(session()->has('success'))
    <div
        class="alert alert-custom alert-notice  my-3 alert-outline-success bg-white fade show rounded-0"
        role="alert">
        <div class="alert-icon">
            <i class="la la-check-circle"></i>
        </div>
        <div class="alert-text">
            <span>{{ session()->get('success')}}</span>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('error'))
    <div
        class="alert alert-custom alert-notice  my-3 alert-outline-danger bg-white fade show rounded-0"
        role="alert">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <div class="alert-text">
            <span>{{ session()->get('error') }}</span>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if(session()->has('warning'))
    <div
        class="alert alert-custom alert-notice  my-3 alert-outline-warning bg-white fade show rounded-0"
        role="alert">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <div class="alert-text">
            <span>{{ session()->get('warning') }}</span>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if(session()->has('info'))
    <div
        class="alert alert-custom alert-notice  my-3 alert-outline-info bg-white fade show rounded-0"
        role="alert">
        <div class="alert-icon">
            <i class="flaticon-information"></i>
        </div>
        <div class="alert-text">
            <span>{{ session()->get('info') }}</span>
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif

@if(session()->has('errors'))
    <div
        class="alert alert-custom alert-notice  my-3 alert-outline-danger bg-white fade show rounded-0"
        role="alert">
        <div class="alert-icon">
            <i class="flaticon-warning"></i>
        </div>
        <div class="alert-text">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
