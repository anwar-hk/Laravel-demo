@extends('layouts.adminLayout.admin_design');
@section('content')
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> 
                <a href="{{url ('/admin/dashboard')}}" title="Go to Home" class="tip-bottom">
                    <i class="icon-home"></i> Home</a>
                <a href="#" class="current">Settings</a> 
            </div>
                <h1>Admin Settings</h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                <h5>Update Password</h5>
                            </div>
                              <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{url('/admin/update-pwd')}}" name="password_validate" id="password_validate" novalidate="novalidate">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="control-group">
                                <label class="control-label">Current Password</label>
                                <div class="controls">
                                    <input type="password" name="pwd_current" id="pwd_current" />
                                    &nbsp;<span id="chkPwd"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New password</label>
                                <div class="controls">
                                    <input type="password" name="pwd_new" id="pwd_new" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm password</label>
                                <div class="controls">
                                    <input type="password" name="pwdnew_confirm" id="pwdnew_confirm" />
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Update Password" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection