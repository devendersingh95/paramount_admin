$(document).ready(function () {
	$("#reset").on('click',function(){
		$("#cat-details").empty();
	});
	$("#add-category").submit(function(e){
								e.preventDefault();
	});
		$("#upload-cat").on('click',function(){
			$("#cat-details").empty();
			 var c_name = $("#cat_name").val();
			 var c_desc = $("#cat_desc").val();
			 var c_img = $("#cat_image").val();
			 var error=0;

			 if(c_name=="")
			 {
				 $("#namediv").addClass("has-error");
				 error=1;
			 }
			 if(c_desc=="")
			 {
				 $("#descdiv").addClass("has-error");
				 error=1;
			 }
			 if(c_img=="")
			 {
				 $("#imgdiv").addClass("has-error");
				 error=1;
			 }
			var form = new FormData($('#add-category')[0]);
			 if(error==0)
			 {
				$.ajax({
                url: 'upload-category.php',
                type: 'POST',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                    return myXhr;
                },
                success: function (data) {
						$("#cat-details").html(data);
	            },
                data: form,
                cache: false,
                contentType: false,
                processData: false
				});
			 }
		});
		$("#login_submit").on("click", function(){
				$("#login_msg").empty();
				var username = $("#username").val();
				var pass = $("#password").val();

				var data = 'user='+username+'&password='+pass;

				if(username!="" && pass!="")
				{
				 $.ajax({

					  type : 'POST',
					  url  : 'check-login.php',
					  data : data,
					 success:function(data)
						   {
							  if(data==1)
								{
								 window.location.href = "profile.php";
								}
								else
								  $("#login_msg").html("Username or Password Entered is Not Found!");
						   }

					 });
				  return false;
				}
				else
				{
					$("#login_msg").html("Username or Password Field Cannot be Empty!");
				}
			});

});
// Yes outside of the .ready space becouse this is a function not an event listner!
function progress(e){
    if(e.lengthComputable){
        //this makes a nice fancy progress bar
        $('progress').attr({value:e.loaded,max:e.total});
    }
}
