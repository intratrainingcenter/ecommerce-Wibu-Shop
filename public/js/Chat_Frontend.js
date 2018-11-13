$(document).ready(function() {
	var uid = $(".message-input").attr('uid');
	if(uid > 0) {
		$.ajax({
			type: "GET",
			dataType: "json",
			url: location.origin+"/Messages/fill/"+uid,
			success: function (data) {
				var lastIndex = 0;
				var src = data.foto;
				$("#nick_user").html(data.nama_pembeli);

				// $("img #img_user").attr('src' , img);

				firebase.database().ref('messages/'+ uid +'/message').on('value', function(snapshot) {
					var value = snapshot.val();
					var htmls = [];
					$.each(value, function(index, value) {
						if(value.level == 'user') {
							htmls.push('<div class="direct-chat-msg right">'+
								'<div class="direct-chat-info clearfix">'+
									'<span class="direct-chat-name pull-right" id="nick_user"></span>'+
									'<span class="direct-chat-timestamp pull-left"><p>'+ value.date +'</p></span>'+
								'</div>'+
								'<img class="direct-chat-img" src="'+location.origin+'/images/avatar.png"  alt="Message User Image">'+
								'<div class="direct-chat-text">'+
									'<p>'+ value.message +'</p>'+
								'</div>'+
							'</div>');
						} else if(value.level == 'admin') {
							htmls.push('<div class="direct-chat-msg">'+
								'<div class="direct-chat-info clearfix">'+
									'<span class="direct-chat-name pull-left">Admin Weaboo Shop</span>'+
									'<span class="direct-chat-timestamp pull-right"><p>'+ value.date +'</p></span>'+
								'</div>'+
								'<img class="direct-chat-img" src="'+location.origin+'/images/Y.png" alt="Message User Image">'+
								'<div class="direct-chat-text">'+
									'<p>'+ value.message +'</p>'+
								'</div>'+
							'</div>');
						}
						lastIndex = index;
					});

					$("#messages_fill").html(htmls);
					$(".messages").animate({ scrollTop: $(document).height()*10 }, 6000);
				});

				firebase.database().ref('messages/'+ uid +'/status').on('value', function(snapshot) {
						var value = snapshot.val();
						if(value.status == 'user') {
							$(".fa-comments-o").hide();
					    $(".fa-comments").show();
						} else {
							$(".fa-comments-o").show();
							$(".fa-comments").hide();
						}
				});
			}
		});
	}

});

function newMessage() {
	var message = $(".message-input input").val();
	var uid = $(".message-input").attr('uid');
	if($.trim(message) == '') {
		return false;
	}
	$(".message-input input").val(null);
	$(".direct-chat-messages").animate({ scrollTop: $(document).height()*10 }, "fast");
	var sendMessage = {
	       date: Date.now(),
				 id: uid,
	       level: 'user',
	       message: message
	     };
	 var sendStatus = {
		 		id: uid,
 	      status: 'admin'
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

$(".search")
