jQuery(document).ready(function($) {
	$(document).on('click','.likePost',function(){
		var post_id=+$(this).parents('.post').data('statusid')
		// counting likes
		var countOfLikes=+$(this).parents('#statusButtons').children('#countOfLikes').html()+1
		$(this).parents('#statusButtons').children('#countOfLikes').html(countOfLikes)
		// 
		$(this).parent().prepend(`
			<i class="fa fa-heart unlikePost" aria-hidden="true"></i>
			`);
		$(this).remove();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/likepost',
			type:'POST',
			data:{post_id},
			success:(r)=>{
			},
			error: (error) => {
                     console.log(JSON.stringify(error));
   }
		})

	})

	$(document).on('click','.unlikePost',function(){
		var post_id=$(this).parents('.post').data('statusid')

		// counting likes
		var countOfLikes=+$(this).parents('#statusButtons').children('#countOfLikes').html()-1
		if(countOfLikes!=0){
			$(this).parents('#statusButtons').children('#countOfLikes').html(countOfLikes)
		}
		else{
			$(this).parents('#statusButtons').children('#countOfLikes').html('')

		}
		// 


		$(this).parent().prepend(`
			<i class="fa fa-heart-o likePost" aria-hidden="true"></i>
			`);
		$(this).remove();


		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/unlikePost',
			type:'post',
			data:{post_id},
			success:(r)=>{
			}
		})
	})

	$(document).on('click','#notifications',function(){
		$("#notifications_div").toggle('slow');
	})

	$('body').click(function(){
		$("#notifications_div").hide('slow')
	})

	$("#notifications_div").click(function(e){
		e.stopPropagation();
	})

	$('.applyFriendRequest').click(function(){
		var user_id=$(this).parents('.not').data('requesteduserid')
		$(this).parents('.not').remove();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/applyFriendRequest',
			type:'POST',
			data:{user_id},
			success:(r)=>{
			}
		})
	})

	$('.declineFriendRequest').click(function(){
		var user_id=$(this).parents('.not').data('requesteduserid')

		$(this).parents('.not').remove();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/declineFriendRequest',
			type:'POST',
			data:{user_id},
			success:(r)=>{
			}
		})
	})
});








