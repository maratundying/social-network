jQuery(document).ready(function($) {
	$(document).on('change','#uploadPhotoInput',function(){
			$('#uploadPhotoForm').submit()  
	})

	$(document).on('focus','textarea',function(){
		$("#add_status_button").css('display', 'block');
	})

	$(document).on('click','#add_status_button',function(){
		var input_status=$("#add_status_input").val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
			}
		});

		$.ajax({
			url:'/addNewStatus',
			type:'post',
			data:{input_status},
			success:(r)=>{
				let user_photo=$("#userPhoto").attr('src')
				let user_name=$("#name_surname").children(':first').html();
				$("#add_status_input").val('')
				$("#myStatuses").prepend(`
						<div class="post" data-statusid="${r.id}">
							<div id="postData">
								<img src='../${user_photo}'>
								<div>
									<p><a href="id/${r.user_id}"><span>${user_name}</span></a></p>
									<p>Just now</p>
								</div>
							</div>

							<div id="userStatus">
								${input_status}
								<div id="statusBorder"></div>
							</div>

							<div id="statusButtons">
								<i class="fa fa-heart-o likePost" aria-hidden="true"></i>
								<span id='countOfLikes'>
								</span>
								<i class="fa fa-commenting-o" aria-hidden="true"></i>
								<i class="fa fa-share" aria-hidden="true"></i>
							</div>
						</div>

					`)
			}
		})
	})
});

function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}

