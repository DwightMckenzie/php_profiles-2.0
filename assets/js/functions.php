<script>
$(document).ready(function() {
/* Admin
=====================================================================*/
    // brings up modal for updating fields
    $(document).on('click', 'button[data-role=editAdmin]', function() {
        $('#updateAdminModal').modal('toggle');
        $('.updte-title').html('Upadate or Delete Administrator');

        var id = $(this).parent('td').parent('tr').attr('id');
        var tbFstname = $('#'+id).children('td[data-target=adminfirstname]').text();
        var tbLstName = $('#'+id).children('td[data-target=adminlastname]').text();
        var tbEmail = $('#'+id).children('td[data-target=adminemail]').text();
        var tbUname = $('#'+id).children('td[data-target=adminusername]').text();
        var tbPword = $('#'+id).children('td[data-target=adminpassword]').text();
        var tbCode = $('#'+id).children('td[data-target=admincode]').text();

        $('#mdlFnameAdmin').val(tbFstname);
        $('#mdlLnameAdmin').val(tbLstName);
        $('#mdlEmailAdmin').val(tbEmail);
        $('#mdlUnameAdmin').val(tbUname);
        $('#mdlPwordAdmin').val(tbPword);
        $('#mdlCodeAdmin').val(tbCode);
        $('#adminId').val(id);

    });
    
	// sends the request to update changes in database
    $('#updateAdmin').click(function() {
        var id = $('#adminId').val();// right here
        var firstname = $('#mdlFnameAdmin').val();
        var lastname = $('#mdlLnameAdmin').val();
        var email = $('#mdlEmailAdmin').val();
        var username = $('#mdlUnameAdmin').val();
        var password = $('#mdlPwordAdmin').val();
        var admincode = $('#mdlCodeAdmin').val();

        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('update'),
                id:id,
                firstname:firstname,
                lastname:lastname,
                email:email,
                username:username,
                password:password,
                admincode:admincode
            },
            success: function(data) {
                $('#'+id).children('td[data-target=adminfirstname]').text(firstname);
                $('#'+id).children('td[data-target=adminlastname]').text(lastname);
                $('#'+id).children('td[data-target=adminemail]').text(email);
                $('#'+id).children('td[data-target=adminusername]').text(username);
                $('#'+id).children('td[data-target=adminpassword]').text(password);
                $('#'+id).children('td[data-target=admincode]').text(admincode);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });
    
	// opens modal warning for deleting profile
    $(document).on('click', 'button[data-role=deleteAdmin]', function() {
        $('#deleteAdminModal').modal('toggle');
        $('.delete-title').html('WARNING!');
        $('.delete-msg').html('<p>Are you sure you want to delete administrator? Once deleted this can not be recovered. If you wish to continue press "Delete". If you are unsure press "Close".</p>');
    });
    
	// Deletes the profile
    $('#deleteAdmin').click(function(){
        var id = $('#adminId').val(),
            trId = '#' + id;
        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('delete'),
                id:id
            },
            success: function(data) {
                window.location.reload(true);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });
    
	// opens the add profile modal
    $(document).on('click', 'button[data-role=addAdmin]', function(){
        $('#addAdminModal').modal('toggle');
    });
    
	// sends form values
    $('#saveAdmin').click(function(){
        /*
        // generates profile id number
        var tr = $('tbody').children('tr');// this needed to count tr
        var trArr = [];// blnk array gets filled later

        // loop each row, gts tr id and places it in array
        $(tr).each(function(){
            var trId = $(this).attr('id');
            trArr.push(trId);
        });

        var lgId = Math.max.apply(Math, trArr);// finds largest id with in table
        var lgIdNew = lgId + 1;

        vars of stored fields
        var id = parseInt(lgIdNew);
        */
        var firstname = $('#addAdminFname').val();
        var lastname = $('#addAdminLname').val();
        var email = $('#addAdminEmail').val();
        var username = $('#addAdminUname').val();
        var password = $('#addAdminPword').val();
        var admincode = $('#addAdminCode').val();

        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('save'),
                firstname:firstname,
                lastname:lastname,
                email:email,
                username:username,
                password:password,
                admincode:admincode
            },
            success: function(data) {
                $('#addAdminFname').val(firstname);
                $('#addAdminLname').val(lastname);
                $('#addAdminEmail').val(email);
                $('#addAdminUname').val(username);
                $('#addAdminPword').val(password);
                $('#addAdminCode').val(admincode);
                window.location.reload(true);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });

/* user
=====================================================================*/
    // brings up modal for updating fields
    $(document).on('click', 'button[data-role=editProf]', function() {
        $('#updateProfModal').modal('toggle');
        $('.updte-title').html('Upadate or Delete profile');

        var id = $(this).parent('td').parent('tr').attr('id');
        var tbFstname = $('#'+id).children('td[data-target=proffirstname]').text();
        var tbLstName = $('#'+id).children('td[data-target=proflastname]').text();
        var tbEmail = $('#'+id).children('td[data-target=profemail]').text();
        var tbUname = $('#'+id).children('td[data-target=profusername]').text();
        var tbPword = $('#'+id).children('td[data-target=profpassword]').text();

        $('#mdlFnameProf').val(tbFstname);
        $('#mdlLnameProf').val(tbLstName);
        $('#mdlEmailProf').val(tbEmail);
        $('#mdlUnameProf').val(tbUname);
        $('#mdlPwordProf').val(tbPword);
        $('#profId').val(id);

    });
    // sends the request to update changes in database
    $('#updateProf').click(function() {
        var id = $('#profId').val();// right here
        var firstname = $('#mdlFnameProf').val();
        var lastname = $('#mdlLnameProf').val();
        var email = $('#mdlEmailProf').val();
        var username = $('#mdlUnameProf').val();
        var password = $('#mdlPwordProf').val();

        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('update'),
                id:id,
                firstname:firstname,
                lastname:lastname,
                email:email,
                username:username,
                password:password
            },
            success: function(data) {
                $('#'+id).children('td[data-target=proffirstname]').text(firstname);
                $('#'+id).children('td[data-target=proflastname]').text(lastname);
                $('#'+id).children('td[data-target=profemail]').text(email);
                $('#'+id).children('td[data-target=profusername]').text(username);
                $('#'+id).children('td[data-target=profpassword]').text(password);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });
    // opens modal warning for deleting profile
    $(document).on('click', 'button[data-role=deleteProf]', function() {
        $('#deleteProfModal').modal('toggle');
        $('.delete-title').html('WARNING!');
        $('.delete-msg').html('<p>Are you sure you want to delete this profile. Once deleted this profile can not be recovered. If you wish to continue press "Delete". If you are unsure press "Close".</p>');
    });
    // Deletes the profile
    $('#deleteProf').click(function(){
        var id = $('#profId').val(),
            trId = '#' + id;
        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('delete'),
                id:id
            },
            success: function(data) {
                window.location.reload(true);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });
    // opens the add profile modal
    $(document).on('click', 'button[data-role=addProf]', function(){
        $('#addProfModal').modal('toggle');
    });
    // sends form values
    $('#saveProf').click(function(){
        /*
        // generates profile id number
        var tr = $('tbody').children('tr');// this needed to count tr
        var trArr = [];// blnk array gets filled later

        // loop each row, gts tr id and places it in array
        $(tr).each(function(){
            var trId = $(this).attr('id');
            trArr.push(trId);
        });

        var lgId = Math.max.apply(Math, trArr);// finds largest id with in table
        var lgIdNew = lgId + 1;

        vars of stored fields
        var id = parseInt(lgIdNew);
        */
        var firstname = $('#addProfFname').val();
        var lastname = $('#addProfLname').val();
        var email = $('#addProfEmail').val();
        var username = $('#addProfUname').val();
        var password = $('#addProfPword').val();

        $.ajax({
            url: 'connection.php',
            type: 'POST',
            // async: false,
            data: {
                button:$(this).data('save'),
                firstname:firstname,
                lastname:lastname,
                email:email,
                username:username,
                password:password
            },
            success: function(data) {
                $('#addProfFname').val(firstname);
                $('#addProfLname').val(lastname);
                $('#addProfEmail').val(email);
                $('#addProfUname').val(username);
                $('#addProfPword').val(password);
                window.location.reload(true);
            },
            error: function(){
                alert("error in ajax form submission");
            }
        });
    });

/* login select
=====================================================================*
    $(function() {
        $('#user-form-link').click(function(e) {
    		$("#user-form").delay(100).fadeIn(100);
     		$("#register-form, #admin-form").fadeOut(100);
    		$('#register-form-link, #admin-form-link').removeClass('active');
    		$(this).addClass('active');
    		e.preventDefault();
    	});
        $('#admin-form-link').click(function(e) {
    		$("#admin-form").delay(100).fadeIn(100);
     		$("#register-form, #user-form").fadeOut(100);
    		$('#register-form-link, #user-form-link').removeClass('active');
    		$(this).addClass('active');
    		e.preventDefault();
    	});
    	$('#register-form-link').click(function(e) {
    		$("#register-form").delay(100).fadeIn(100);
     		$("#user-form, #admin-form").fadeOut(100);
    		$('#user-form-link, #admin-form-link').removeClass('active');
    		$(this).addClass('active');
    		e.preventDefault();
    	});
    });
*/

/* reset form inputs
=====================================================================*/
$('#registersubmit').click(function(){
    $('#register-form input').reset();
});




});

</script>
