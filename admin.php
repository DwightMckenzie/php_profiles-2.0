<?php
// page info
    $pg_title = 'Admin Page';
    $pg_class = 'admin';
    $pg_desc = 'Here is were sub admin profile';
    $pg_keywords = 'admin, profile';
    // $jumbotronText = 'Welcome there';

    // required
    require_once "includes/config.php";
    require_once "includes/header.php";
    require_once "includes/classes/User.php";
    require_once "includes/classes/Session.php";

    require_once "includes/header.php";
    
    // is the user logged in
	// Session::userLoggedIn(Session::get('userLoggedIn'));

	// get user array
    $user = User::userVariables($conn, Session::get('userLoggedIn'));
?>

    <b id="logout"><a href="logout.php">Log Out</a>
    <div>
        <h2>Administrators</h2>
        <button type="button" class="btn btn-default btn-xs" data-role="addAdmin">Add Admin</button>
    </div>
	<table class="table table-sm table-bordered">
		<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Admin Code</th>
                <th>Edit</th>
			</tr>
		</thead>
    <?php
        $sql = "SELECT * FROM admin_prof WHERE id";
        $adminResult = $conn->query($sql);
    ?>
        <tbody>
            <?php while ($row = $adminResult->fetch_assoc()) : ?>
                <?php
                    echo '<tr id="' . $row['ID'] . '">';
                        echo '<td data-target="adminfirstname">' . $row['firstname'] . '</td>';
                        echo '<td data-target="adminlastname">' . $row['lastname'] . '</td>';
                        echo '<td data-target="adminemail">' . $row['email'] . '</td>';
                        echo '<td data-target="adminusername">' . $row['username'] . '</td>';
                        echo '<td data-target="adminpassword">' . $row['password'] . '</td>';
                        echo '<td data-target="admincode">' . $row['admincode'] . '</td>';
                        echo '<td><button type="button" class="btn btn-default btn-xs edit" data-role="editAdmin">Edit</button></td>';
                    echo '</tr>';
                ?>
            <?php endwhile; ?>
		</tbody>
	</table>
    <div id="updateAdminModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title updte-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="mdlFnameAdmin">Firstname:</label>
                            <input type="text" class="form-control" id="mdlFnameAdmin" />
                        </div>
                        <div class="form-group">
                            <label for="mdlLnameAdmin">Lastname:</label>
                            <input type="text" class="form-control" id="mdlLnameAdmin" />
                        </div>
                        <div class="form-group">
                            <label for="mdlEmailAdmin">Email:</label>
                            <input type="text" class="form-control" id="mdlEmailAdmin" />
                        </div>
                        <div class="form-group">
                            <label for="mdlUnameAdmin">Username:</label>
                            <input type="text" class="form-control" id="mdlUnameAdmin" />
                        </div>
                        <div class="form-group">
                            <label for="mdlPwordAdmin">Password:</label>
                            <input type="text" class="form-control" id="mdlPwordAdmin" />
                        </div>
                        <div class="form-group">
                            <label for="mdlCodeAdmin">Admin Pin:</label>
                            <input type="text" class="form-control" id="mdlCodeAdmin" />
                        </div>
                        <input type="hidden" class="form-control" id="adminId"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default btn-sm pull-right" data-dismiss="modal" data-update="updateAdmin" id="updateAdmin">Update</button>
                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-role="deleteAdmin" name="deleteAdmin">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div id="deleteAdminModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title delete-title">Delete Administrator</h4>
                </div>
                <form action="" method="post" role="form">
                    <div class="modal-body delete-msg">
                        <!-- <p>Are you sure your want to delete this profile. Once deleted this profile can not be recovered. If you wish to continue press "Delete". If you are unsure press "Close".</p> -->
                        <!-- <input type="hidden" class="form-control" id="deleteProfId"> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-delete="deleteAdmin" name="deleteAdmin" value="deleteAdmin" id="deleteAdmin">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="addAdminModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add a Administrators</h4>
                </div>
                <div class="modal-body" id="addFrm">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="addAdminFname">Firstname:</label>
                            <input type="text" class="form-control" data-add="adminfirstname" id="addAdminFname" />
                        </div>
                        <div class="form-group">
                            <label for="addAdminLname">Lastname:</label>
                            <input type="text" class="form-control" data-add="adminlastname" id="addAdminLname" />
                        </div>
                        <div class="form-group">
                            <label for="addAdminEmail">Email:</label>
                            <input type="text" class="form-control" data-add="adminemail" id="addAdminEmail" />
                        </div>
                        <div class="form-group">
                            <label for="addAdminUname">Username:</label>
                            <input type="text" class="form-control" data-add="adminusername" id="addAdminUname" />
                        </div>
                        <div class="form-group">
                            <label for="addAdminPword">Password:</label>
                            <input type="text" class="form-control" data-add="adminpassword" id="addAdminPword" />
                        </div>
                        <div class="form-group">
                            <label for="addAdminCode">Code:</label>
                            <input type="text" class="form-control" data-add="admincode" id="addAdminCode" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-sm pull-right" data-dismiss="modal" data-save="saveAdmin" name="saveAdmin" id="saveAdmin">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2>Profiles</h2>
        <button type="button" class="btn btn-default btn-xs" data-role="addProf">Add Profile</button>
    </div>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Edit</th>
            </tr>
        </thead>
    <?php
        $sql = "SELECT * FROM user_prof WHERE id";
        $profResult = $conn->query($sql);
    ?>
        <tbody>
            <?php while ($row = $profResult->fetch_assoc()) : ?>
                <?php
                    echo '<tr id="' . $row['ID'] . '">';
                        echo '<td data-target="proffirstname">' . $row['firstname'] . '</td>';
                        echo '<td data-target="proflastname">' . $row['lastname'] . '</td>';
                        echo '<td data-target="profemail">' . $row['email'] . '</td>';
                        echo '<td data-target="profusername">' . $row['username'] . '</td>';
                        echo '<td data-target="profpassword">' . $row['password'] . '</td>';
                        echo '<td><button type="button" class="btn btn-default btn-xs edit" data-role="editProf">Edit</button></td>';
                    echo '</tr>';
                ?>
            <?php endwhile; ?>
        </tbody>
    </table>
    <div id="updateProfModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title updte-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="mdlFnameProf">Firstname:</label>
                            <input type="text" class="form-control" id="mdlFnameProf" />
                        </div>
                        <div class="form-group">
                            <label for="mdlLnameProf">Lastname:</label>
                            <input type="text" class="form-control" id="mdlLnameProf" />
                        </div>
                        <div class="form-group">
                            <label for="mdlEmailProf">Email:</label>
                            <input type="text" class="form-control" id="mdlEmailProf" />
                        </div>
                        <div class="form-group">
                            <label for="mdlUnameProf">Username:</label>
                            <input type="text" class="form-control" id="mdlUnameProf" />
                        </div>
                        <div class="form-group">
                            <label for="mdlPwordProf">Password:</label>
                            <input type="text" class="form-control" id="mdlPwordProf" />
                        </div>
                        <input type="hidden" class="form-control" id="profId"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default btn-sm pull-right" data-dismiss="modal" data-update="updateProf" id="updateProf">Update</button>
                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-role="deleteProf" name="deleteProf">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div id="deleteProfModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4 class="modal-title delete-title">Delete Profile</h4>
                </div>
                <form action="" method="post" role="form">
                    <div class="modal-body delete-msg">
                        <!-- <p>Are you sure your want to delete this profile. Once deleted this profile can not be recovered. If you wish to continue press "Delete". If you are unsure press "Close".</p> -->
                        <!-- <input type="hidden" class="form-control" id="deleteProfId"> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-delete="deleteProf" name="deleteProf" value="deleteProf" id="deleteProf">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="addProfModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add a Users</h4>
                </div>
                <div class="modal-body" id="addFrm">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="addProfFname">Firstname:</label>
                            <input type="text" class="form-control" data-add="proffirstname" id="addProfFname" />
                        </div>
                        <div class="form-group">
                            <label for="addProfLname">Lastname:</label>
                            <input type="text" class="form-control" data-add="proflastname" id="addProfLname" />
                        </div>
                        <div class="form-group">
                            <label for="addProfEmail">Email:</label>
                            <input type="text" class="form-control" data-add="profemail" id="addProfEmail" />
                        </div>
                        <div class="form-group">
                            <label for="addProfUname">Username:</label>
                            <input type="text" class="form-control" data-add="profusername" id="addProfUname" />
                        </div>
                        <div class="form-group">
                            <label for="addProfPword">Password:</label>
                            <input type="text" class="form-control" data-add="profpassword" id="addProfPword" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-sm pull-right" data-dismiss="modal" data-save="saveProf" name="saveProf" id="saveProf">Save</button>
                </div>
            </div>
        </div>
    </div>

<?php include 'functions.php' ?>
<?php include 'footer.php' ?>
