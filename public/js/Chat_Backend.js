$(function() {
// $(".messages").animate({ scrollTop: $(document).height()*10 }, "fast");
$('.preview').html("<span>there hasn't been a message<span>");
	$.ajax({
		type: "GET",
		dataType: "json",
		url: location.origin+"/Messages/list",
		success: function (data) {
			var lastIndex = 0;
			for (var i = 0; i < data.length; i++) {
				firebase.database().ref('messages/'+ data[i].id +'/message').limitToLast(1).on('value', function(snapshot) {
						var value = snapshot.val();
						$.each(value, function(index, value) {
							console.log(value.level);
							if(value.level == 'admin') {
								$('.preview[uid*='+ value.id +']').html('<span>You: </span>'+value.message);
							} else if(value.level == 'user') {
								$('.preview[uid*='+ value.id +']').html(value.message);
							}
						});
				});
				firebase.database().ref('messages/'+ data[i].id +'/status').on('value', function(snapshot) {
						var value = snapshot.val();
						console.log(value.status, value.id);
						if(value.status == 'admin') {
							$('.contact[uid*='+ value.id +'] div.wrap').prepend('<span class="contact-status busy"></span>');
						} else {
							$('.contact[uid*='+ value.id +'] div.wrap span.contact-status').remove();
						}

				});
			}
		}
	});
});

function newMessage() {
	var message = $(".message-input input").val();
	var uid = $(".message-input").attr('uid');
	if($.trim(message) == '') {
		return false;
	}
	$(".message-input input").val(null);
	$(".contact.active .preview").html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height()*10 }, "fast");

	var sendMessage = {
	       date: Date.now(),
				 id: uid,
	       level: 'admin',
	       message: message
	     };
	 var sendStatus = {
		 		id: uid,
 	      status: 'user'
 	     };

	     // Get a key for a new Post.
	     var newPostKey = firebase.database().ref('messages').push().key;

	     // Write the new post's data simultaneously in the posts list and the user's post list.
	     var updates = {};
			 updates['/messages/' + uid + '/message/' + newPostKey] = sendMessage;
			 updates['/messages/' + uid + '/status'] = sendStatus;

	     return firebase.database().ref().update(updates);

};

$(".submit").click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});
$("li.contact").click(function() {
	$(".contact-profile").removeAttr('style');
	$(".message-input").removeAttr('style');
	$(".content_image").hide();
  $("li.active").removeClass('active');
	$(this).addClass('active');
  var uid = $(this).attr('uid');
	$(".message-input").attr('uid',uid);

	$.ajax({
		type: "GET",
		dataType: "json",
		url: location.origin+"/Messages/fill/"+uid,
		success: function (data) {
			$("#nick_user").html(data.nama_pembeli)
			var lastIndex = 0;

			firebase.database().ref('messages/'+ uid +'/message').on('value', function(snapshot) {
			    var value = snapshot.val();
			    var htmls = [];
			    $.each(value, function(index, value) {
						if(value.level == 'admin') {
							htmls.push('<li class="sent">'+
							'<img src="images/Y.png" alt="" />'+
							'<p>'+ value.message +'</p>'+
							'</li>');
						} else if(value.level == 'user') {
							htmls.push('<li class="replies">'+
							'<img src="images/W.jpg" alt="" />'+
							'<p>'+ value.message +'</p>'+
							'</li>');
						}
			    	lastIndex = index;

			    });
			    $("#messages_fill").html(htmls);
			});

		}
	});

	$(".messages").animate({ scrollTop: $(document).height()*10 }, 1000);
});

$(".search")
