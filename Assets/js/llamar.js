// JavaScript Document

function llamar(){
	$.ajax({
		  statusCode: {
			404: function() {
			  alert( "page not found" );
			},
			500: function() {
			  alert( "500" );
			},
		  },
		  type: "POST",
		  url: "../Library/source/source.php",
		  //dataType: "json",
		  data: { user: $("#user").val(), pass: $("#pass").val()  }
		}).done(function(data) { 
			if($.trim(data)=="si"){
				location.href = "../View/inicio.php";
			}else{
				alert01();
			}
		}).fail(function() {
			alert( "error fail" );
		});
	
	}