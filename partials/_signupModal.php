<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModal">SignUp iDiscuss Forums Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/forums/partials/_handelSignup.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signUpName" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="signUpName"  name="signUpName" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll fill correct Name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="signUpEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="signUpEmail" name="signUpEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="signUpMobile" class="form-label">Mobile No:</label>
                        <input type="numeric" class="form-control" id="signUpMobile" name="signUpMobile">
                    </div>
                    <div class="mb-3">
                        <label for="signUpPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signUpPassword" name="signUpPassword">
                    </div>
                    <div class="mb-3">
                        <label for="conf_signUpPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="conf_signUpPassword" name="conf_signUpPassword">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </form>
        </div>
    </div>
</div>