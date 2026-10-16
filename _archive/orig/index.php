<?php
    $page_title = 'profile';
    // $pgDesc = 'Page Description here';
    // // $keyWords = 'Keywords here';
    // $jumbotronText = 'Welcome there';
    include ('header.php');
    require_once 'connection.php';
?>
		<div class="container">
			<h2>Edit Database</h2>
			<p>This allows you to edit, add and delete the current database, upon request.</p>
			<table class="table table-sm table-dark table-bordered">
				<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Phone</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Edit</th>
					</tr>
				</thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <?php
                            echo '<tr id="' . $row['id'] . '">';
                                echo '<td data-target="firstname">' . $row['firstname'] . '</td>';
                                echo '<td data-target="lastname">' . $row['lastname'] . '</td>';
                                echo '<td data-target="phone">' . $row['phone'] . '</td>';
                                echo '<td data-target="email">' . $row['email'] . '</td>';
                                echo '<td data-target="dob">' . $row['dob'] . '</td>';
                                echo '<td><button type="button" class="btn btn-xs btn-default edit" data-role="edit">Edit</button></td>';
                            echo '</tr>';
                        ?>
                    <?php endwhile; ?>
				</tbody>
			</table>
            <div>
                <button type="button" class="btn btn-info btn-sm" data-role="addProf">Add Profile</button>
            </div>
            <div id="updateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                            <h4 class="modal-title updte-title"></h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" role="form">
                                <div class="form-group">
                                    <label for="mdlFname">Firstname:</label>
                                    <input type="text" class="form-control" id="mdlFname" />
                                </div>
                                <div class="form-group">
                                    <label for="mdlLname">Lastname:</label>
                                    <input type="text" class="form-control" id="mdlLname" />
                                </div>
                                <div class="form-group">
                                    <label for="mdlPhone">Phone:</label>
                                    <input type="text" class="form-control" id="mdlPhone" />
                                </div>
                                <div class="form-group">
                                    <label for="mdlEmail">Email:</label>
                                    <input type="text" class="form-control" id="mdlEmail" />
                                </div>
                                <div class="form-group">
                                    <label for="mdlDob">DOB:</label>
                                    <input type="text" class="form-control" id="mdlDob" />
                                </div>
                                <input type="hidden" class="form-control" id="profId"/>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default btn-sm pull-right" data-dismiss="modal" data-update="update" id="update">Update</button>
                            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-role="delete" name="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="deleteModal" class="modal fade" role="dialog">
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
                                <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal" data-delete="delete" name="delete" value="delete" id="delete">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="addProfModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add a Profile</h4>
                        </div>
                        <div class="modal-body" id="addFrm">
                            <form action="" method="post" role="form">
                                <div class="form-group">
                                    <label for="addFname">Firstname:</label>
                                    <input type="text" class="form-control" data-add="firstname" id="addFname" />
                                </div>
                                <div class="form-group">
                                    <label for="addLname">Lastname:</label>
                                    <input type="text" class="form-control" data-add="lastname" id="addLname" />
                                </div>
                                <div class="form-group">
                                    <label for="addPhone">Phone:</label>
                                    <input type="text" class="form-control" data-add="phone" id="addPhone" />
                                </div>
                                <div class="form-group">
                                    <label for="addEmail">Email:</label>
                                    <input type="text" class="form-control" data-add="email" id="addEmail" />
                                </div>
                                <div class="form-group">
                                    <label for="addDob">DOB:</label>
                                    <input type="text" class="form-control" data-add="dob" id="addDob" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success btn-sm pull-right" data-dismiss="modal" data-save="save" name="save" id="save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'functions.php' ?>
<?php include ('footer.php') ?>
