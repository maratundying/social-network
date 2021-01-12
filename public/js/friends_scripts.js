jQuery(document).ready(function($) {
	$(document).on('click','#unfriendButton',function(){
		var user_id=$(this).parents('.friend').data('userid')
		$(".friendsActionButtons").children('div').remove();
		$(this).parents('.friend').children(".friendsActionButtons").append(`
				<div>
					<span id='removeFriend'>Yes</span> <span id='cancelRemoving'>Cancel</span>
				</div>
			`)
	})

	$(document).on('click','#cancelRemoving',function(){
		$(".friendsActionButtons").children('div').remove();
	})

	$(document).on('click','#removeFriend',function(){
		var user_id=$(this).parents('.friend').data('userid')
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'unfriendFromFriend',
			type:'post',
			data:{user_id},
			success:(r)=>{
				 $(this).parents('.friend').remove();
			}
		})
	})
});