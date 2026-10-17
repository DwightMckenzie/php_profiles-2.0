$(document).ready(function() {
	/*
		user page
	*/
    // brings up modal for updating fields
    $(document).on('click', 'button[data-role=editProf]', function() {
        $('#updateProfModal').modal('toggle');
        $('.updte-title').html('Upadate or Delete profile');

        let id = $(this).parent('td').parent('tr').attr('id');
        let tbFstname = $('#'+id).children('td[data-target=proffirstname]').text();
        let tbLstName = $('#'+id).children('td[data-target=proflastname]').text();
        let tbEmail = $('#'+id).children('td[data-target=profemail]').text();
        let tbUname = $('#'+id).children('td[data-target=profusername]').text();
        let tbPword = $('#'+id).children('td[data-target=profpassword]').text();

        $('#mdlFnameProf').val(tbFstname);
        $('#mdlLnameProf').val(tbLstName);
        $('#mdlEmailProf').val(tbEmail);
        $('#mdlUnameProf').val(tbUname);
        $('#mdlPwordProf').val(tbPword);
        $('#profId').val(id);

    });
    
	// sends the request to update changes in database
    $('#updateProf').click(function() {
        let id = $('#profId').val();// right here
        let firstname = $('#mdlFnameProf').val();
        let lastname = $('#mdlLnameProf').val();
        let email = $('#mdlEmailProf').val();
        let username = $('#mdlUnameProf').val();
        let password = $('#mdlPwordProf').val();

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
        let id = $('#profId').val(),
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
        let tr = $('tbody').children('tr');// this needed to count tr
        let trArr = [];// blnk array gets filled later

        // loop each row, gts tr id and places it in array
        $(tr).each(function(){
            let trId = $(this).attr('id');
            trArr.push(trId);
        });

        let lgId = Math.max.apply(Math, trArr);// finds largest id with in table
        let lgIdNew = lgId + 1;

        lets of stored fields
        let id = parseInt(lgIdNew);
        */
        let firstname = $('#addProfFname').val();
        let lastname = $('#addProfLname').val();
        let email = $('#addProfEmail').val();
        let username = $('#addProfUname').val();
        let password = $('#addProfPword').val();

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


});