$(function() {
	
	$(document).on("scroll", function() {
		if ($(this).scrollTop()) {
			$('#header').fadeOut();
		} else {
			$('#header').show();
		}
	});

	$('#cd-login-modal').on("click", function() {
		$("#login-modal-dialog").dialog({
			height: 320,
			width: 400,
			resizable: false,
			draggable: false,
			modal: true,
			buttons: {
				"Login": function() {
					sendLoginRequest();
				}
			}
		});	
	});

	function sendLoginRequest() {
		$.ajax({
			type: 'GET',
			url: 'authenticate.php?' + $('#login-modal-form').serialize(),
			success: function(result) {
				if (result.indexOf("failure") != -1) {
					console.log("didn't authenticate");
					$("#error-msg-space").html("<p style='color:red'>There was a problem and we could not authenticate you.</p>");
				} else {
					console.log(result);
					alert("Welcome back to Crayon!");
					window.location.href="crayon.php";
				}
			}
		});
	}

	$('#submit-signup-button').on("click", function() {
      	$.ajax({
	        url: 'register.php?' + $('form').serialize(),
	        type: 'GET',
	        success: function(result) {
	          	if (result.indexOf("success") != -1) {
		            console.log("Successfully stored user in the database");
		            alert("Welcome to Crayon!");
		            window.location.href = "crayon.php";
	          	} else {
		         	alert("Sorry, that email already exists.");  
          		}
        	}
      	});
    });

    $('button[name]').on("click", function() {
    	var crayon = $(this).attr('name');
    	console.log(crayon);
    	var price = $('input[name=' + crayon + ']').val();
    	console.log(price);

    	$.ajax({
    		url: 'addtocart.php?crayon='+crayon+'&price='+price,
    		type: 'GET',
    		success: function(result) {
    			if (result.indexOf("success") != -1) {
    				console.log("Successfully added to cart");
    				alert("Successfully added " + crayon + "to cart");
    			} else if (result.indexOf("nouser") != -1) {
    				console.log("User is not logged in");
    				alert("Please log in/register to buy crayons.");
    				window.location.href = "index.php";
    			} else if (result.indexOf("updated") != -1) {
    				console.log("Updated cart");
    				alert("Successfully added " + crayon + "to cart");
    			} else {
    				console.log("Failed to add to cart");
    			}
    		}
    	});
    });


    $('#checkout-button').on("click", function() {
    	$.ajax({
    		url: 'processorder.php',
    		type: 'GET',
    		success: function(result) {
    			if (result.indexOf("noitems") != -1) {
    				alert("You have no items in your cart.");
    			} else if (result.indexOf("success") != -1) {
    				console.log("Successful checkout");
    				alert("Thank you for shopping at Crayon!");
    				window.location.href = "shoppingcart.php";
    			} else {
    				console.log("Failed to check out");
    			}
    		}
    	});
    });

});
