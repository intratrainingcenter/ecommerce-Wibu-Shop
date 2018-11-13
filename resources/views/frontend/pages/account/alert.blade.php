
@if (session('alertSuccessPassword'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertSuccessPassword')}}</strong>
    </div>
</div>
@elseif(session('alertFailProfile'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertFailProfile')}}</strong>
    </div>
</div>
@elseif(session('alertSuccessProfile'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertSuccessProfile')}}</strong>
    </div>
</div>
@elseif(session('alertSuccessAddAddress'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertSuccessAddAddress')}}</strong>
    </div>
</div>
@elseif(session('alertFailAddAddress'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertFailAddAddress')}}</strong>
    </div>
</div>
@elseif(session('alertSuccessDeleteAddress'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertSuccessDeleteAddress')}}</strong>
    </div>
</div>
@elseif(session('alertSuccessUpdateAddress'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertSuccessUpdateAddress')}}</strong>
    </div>
</div>
@elseif(session('alertFailUpdateAddress'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6 alert-notification">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('alertFailUpdateAddress')}}</strong>
    </div>
</div>
@elseif(session('alertSuccessRegister'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <strong>{{session('alertSuccessRegister')}}</strong>
    </div>
</div>
@elseif(session('alertFailRegister'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <strong>{{session('alertFailRegister')}}</strong>
    </div>
</div>
@elseif(session('alertFailLogin'))
<div style="position: absolute; z-index: 999; right: -10px; top:150px" class="col-md-6">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <strong>{{session('alertFailLogin')}}</strong>
    </div>
</div>
@endif