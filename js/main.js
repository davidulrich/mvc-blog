$(document).bind("mobileinit", function(){$.mobile.ajaxEnabled = false;});
$(function() {
$.extend($.event.special.swipe,{
  scrollSupressionThreshold: 10, // More than this horizontal displacement, and we will suppress scrolling.
  durationThreshold: 1000, // More time than this, and it isn't a swipe.
  horizontalDistanceThreshold: 30,  // Swipe horizontal displacement must be more than this.
  verticalDistanceThreshold: 75,  // Swipe vertical displacement must be less than this.
});
	$(".nav-arrow-l,.nav-arrow-r").click(function() {
		$("#loading").show();
	});
	$('html,body').on("swipeleft",function(e) {
		if(pw_ns.slug != "0" && $(window).width() <= 600) {
			$("#loading").show();
			e.preventDefault()
			var nextpage = parseInt(pw_ns.cur_page)+1;
			window.location.href="/posts/"+pw_ns.slug+"/"+nextpage;
		}
	});
	$('html,body').on("swiperight",function(e) {
		if(pw_ns.slug != "0" && $(window).width() <= 600) {
			$("#loading").show();
			e.preventDefault()
			var prevpage = parseInt(pw_ns.cur_page)-1;
			window.location.href="/posts/"+pw_ns.slug+"/"+prevpage;
		}
	});
	$("#nav-btn").click(function(e) {
		e.stopPropagation();
		$(this).toggleClass("nav-menu-active");
		$("#page-nav-sections").fadeToggle();
	});
	$('html,body').click(function() {
		$("#nav-btn").removeClass("nav-menu-active");
		$("#page-nav-sections").fadeOut();
		if($(window).width() <= 1080) {
			$(".topic-list").fadeOut();
		}
	});
	$(".nav-header").click(function(e) {
		e.stopPropagation();
		if($(window).width() <= 1080) {
			$(".topic-list").hide();
			$(this).parent().find(".topic-list").fadeToggle();
		}
	});
	$("#submit-comment").click(function() {
   		var dataString = $("#comment-form").serialize();
   		if($("#p-name").val() != "" && IsEmail($("#p-email").val()) && $("#comment-body").val()) {
   			$("#submit-comment").hide();
			$.ajax({ type: "POST", url: "/ajax/comment.php", data: dataString, success: function(response) {
				if(response == "OK") {
					$("#feedback").removeClass("red-text").addClass("green-text");
					$("#feedback").html("Your comment was successfully submitted!  Once approved, it will appear on this page.");
					$("#submit-comment").show();
				} else {
					$("#feedback").removeClass("green-text").addClass("red-text");
					$("#feedback").html("There was an error submitting your comment.  Please try again later.");
				}
			}});  
		} else {
			$("#feedback").removeClass("green-text").addClass("red-text");
			$("#feedback").html("Please enter your name and email address.");
		}
	});
	$(".rmv").click(function() {
		var id = $(this).data("ref");
		if(window.confirm("Are you sure you want to delete this thread?")) {
		$.ajax({ type: "POST", url: "/ajax/delete.php", data: {pid: id}, success: function(response) {
			if(response == "OK") {
				location.reload();
			}
		}});
		}
	});
});

function add_page() {
	pw_ns.pages++;
	$("#post-pages").append("<input type=text name='chapter-"+pw_ns.pages+"' placeholder='Chapter name (optional)'><textarea name='page-"+pw_ns.pages+"'></textarea>");
	$("#post-page-count").html("<input type='hidden' name='page-count' value='"+pw_ns.pages+"'>");
}
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}