<h3><strong>Register as an accommodation provider</strong></h3>
<hr>
<form id="frmSignUp"  name="frmSignUp" class="form-horizontal">
    <div class="form-group">
        <label for="txtEmail" class="col-sm-3 control-label" style="text-align:left">Email address</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="txtEmail" name="email" placeholder="Email address" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtPassword" class="col-sm-3 control-label" style="text-align:left">Choose a password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Choose a password" data-toggle="tooltip" data-placement="right" title="Enter a password at least 6 characters long" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtComfirmPassword" class="col-sm-3 control-label" style="text-align:left">Comfirm Password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="txtConfirmPassword" name="txtComfirmPassword" placeholder="Comfirm Password" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtFirstname" class="col-sm-3 control-label" style="text-align:left">First Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="txtFirstname" name="firstname" placeholder="First Name" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtLastname" class="col-sm-3 control-label" style="text-align:left">Last Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="txtLastname" name="lastname" placeholder="Last Name" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtOrganization" class="col-sm-3 control-label" style="text-align:left">Organization</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="txtOrganization" name="organization" placeholder="Organization" required>
        </div>
    </div>
    <div class="form-group">
        <label for="txtMailingAddress" class="col-sm-3 control-label" style="text-align:left">Mailing Address</label>
        <div class="col-sm-7">
            <textarea id="txtMailingAddress" name="mailingaddress" class="form-control" rows="3" required></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="txtTelephoneNumber" class="col-sm-3 control-label" style="text-align:left">Telephone Number</label>
        <div class="col-sm-7">
            <input type="text" class="form-control" id="txtOrganization" name="telephonenumber" placeholder="Telephone Number" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" style="text-align:left"></label>
        <div class="col-sm-7">
            <input type="checkbox" id="chkTermCondition" value="1">
            I have read and agree to the <a href="#">terms and conditions</a> 
        </div>
    </div>
    <div clasfhs="form-group">
        <label class="col-sm-3 control-label" style="text-align:left"></label>
        <div class="col-sm-5">
            <button type="submit" id="submit" name="submit" class="btn btn-success" data-loading-text="Loading..." autocomplete="off">Register</button>
        </div>
    </div>
</form>