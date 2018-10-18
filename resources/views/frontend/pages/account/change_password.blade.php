<div id="FormPassword" class="col-md-9 col-sm-7" hidden>
    <h1>Change Password</h1>
    <div class="content-page">
        <form action="/edit">
        @csrf @method('PATCH')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" name="new_password">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Confirm New Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
            </div>
        </div>
        <div class="row">
            <button id="Save" type="submit" class="btn btn-success pull-right" style="margin:10px">Save</button>
            <button type="button" class="btn btn-danger pull-right cancel" style="margin:10px">Cancel</button>
        </div>
        </form>
    </div>
</div>