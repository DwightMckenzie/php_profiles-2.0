$(document).ready(function() {
	/**
		Admin Page
	*/
	
	// brings up modal for updating fields
    $(document).on('click', 'button[data-role=editAdmin]', function() {
        $('#updateAdminModal').modal('toggle');
        $('.updte-title').html('Upadate or Delete Administrator');

        let id = $(this).parent('td').parent('tr').attr('id');
        let tbFstname = $('#'+id).children('td[data-target=adminfirstname]').text();
        let tbLstName = $('#'+id).children('td[data-target=adminlastname]').text();
        let tbEmail = $('#'+id).children('td[data-target=adminemail]').text();
        let tbUname = $('#'+id).children('td[data-target=adminusername]').text();
        let tbPword = $('#'+id).children('td[data-target=adminpassword]').text();
        let tbCode = $('#'+id).children('td[data-target=admincode]').text();

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
        let id = $('#adminId').val();// right here
        let firstname = $('#mdlFnameAdmin').val();
        let lastname = $('#mdlLnameAdmin').val();
        let email = $('#mdlEmailAdmin').val();
        let username = $('#mdlUnameAdmin').val();
        let password = $('#mdlPwordAdmin').val();
        let admincode = $('#mdlCodeAdmin').val();

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
        let id = $('#adminId').val(),
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
        let firstname = $('#addAdminFname').val();
        let lastname = $('#addAdminLname').val();
        let email = $('#addAdminEmail').val();
        let username = $('#addAdminUname').val();
        let password = $('#addAdminPword').val();
        let admincode = $('#addAdminCode').val();

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

});
