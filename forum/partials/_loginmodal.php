<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginmodalLabel">Login to myForum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forum/partials/_handlelogin.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="loginEmail">Username</label>
                        <input type="text" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Password</label>
                        <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>