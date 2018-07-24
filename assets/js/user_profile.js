changeProfileInformation = function (str) {
    var reqesturl = $('#P_reqesturl').val();
   // var value = $('#user_dropdown').val();
    var value = str;
	if(value != 5 && value!=11)
	{
	$.ajax({
        type: 'POST',
        url: reqesturl,
        data: {
            id: value
        },
		
        success: function (res) {
            //$("#profile-information").html(res);
            $("#profile-information12").html(res);
            $("#myModal").modal();
			
        },
        dataType: 'html'
    });
	
	}
}//