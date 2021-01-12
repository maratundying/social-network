jQuery(document).ready(function($) {
	$(document).on('click','#addFriendButton',function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		var userId=$(this).parents('#users_contact_div').data('userid')
		
		$.ajax({
			url:'/sendFriendRequest',
			type:'POST',
			data:{userId},
			success:(r)=>{
				$("#friendOrUnfriend").empty().append(`<p class='cancelFriendRequest' data-data='${r.id}''>Cancel friend request</p>`)

			}
		})
	})

	$(document).on('click','.cancelFriendRequest',function(){
		var request_id=$(this).data('data')

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/cancelFriendRequest',
			type:'POST',
			data:{request_id},
			success:(r)=>{
				$("#friendOrUnfriend").empty().append(`<button id="addFriendButton">Add friend</button>`)
			}
		})
	})
});