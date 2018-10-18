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

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            @include('frontend.pages.account.sidebar')
            <!-- BEGIN CONTENT -->
            <div id="FormPassword" class="col-md-9 col-sm-7">
                <h1>Change Password</h1>
                <div class="content-page">
                    <form action="{{route('change.password', ['id' => $user->id])}}" method="POST">
                    @csrf @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="new_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Confirm New Password</label>
                                <input type="password" class="form-control" name="confirm_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
                        <a href="{{route('account.edit')}}" class="btn btn-danger pull-right" style="margin:10px; color:white">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
@endsection