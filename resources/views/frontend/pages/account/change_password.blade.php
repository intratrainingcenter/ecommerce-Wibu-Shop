@extends('frontend.index')
@extends('frontend.pages.account.additional')
@section('produck')
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('pembeli.account')}}">My Account</a></li>
            <li class="active">Profile</li>
        </ul>
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            <div id="FormPassword" class="col-md-9 col-sm-7">
                <h1>Change Password</h1>
                <div class="content-page">
                    <form action="{{route('change.password', ['id' => $user->id])}}" method="POST">
                    @csrf @method('PATCH')
                    @if (session('alertWrongPassword'))
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Current Password</label>
                                    <input id="Current" type="password" class="form-control alert-danger" name="password" required>
                                    <span id="CurrentSpan" style="color:red">{{session('alertWrongPassword')}}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Current Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('alertNewPassword'))
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input id="New" type="password" class="form-control alert-danger" name="new_password" required>
                                    <span id="NewSpan" style="color:red">{{session('alertNewPassword')}}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control" name="new_password" required>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('alertConfirmPassword'))
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input id="Confirm" type="password" class="form-control alert-danger" name="confirm_password" required>
                                    <span id="ConfirmSpan" style="color:red">{{session('alertConfirmPassword')}}</span>
                                </div>
                            </div>
                        </div>
                    @elseif(session('alertNewPassword'))
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input id="Confirm" type="password" class="form-control alert-danger" name="confirm_password" required>
                                    <span id="ConfirmSpan" style="color:red">{{session('alertConfirmPassword')}}</span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Confirm New Password</label>
                                    <input type="password" class="form-control" name="confirm_password" required>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <button type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
                        <a href="{{route('account.edit')}}" class="btn btn-danger pull-right" style="margin:10px; color:white">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
