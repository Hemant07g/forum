<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">Signup for myForum account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handlesignup.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>