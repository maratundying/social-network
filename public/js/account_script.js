jQuery(document).ready(function($) {
	$(document).on('change','#uploadPhotoInput',function(){
			$('#uploadPhotoForm').submit()  
	})

	$(document).on('focus','textarea',function(){
		$("#add_status_button").css('display', 'block');
	})

	$(document).on('click','#add_status_button',function(){
		var input_status=$("#add_status_input").val();
		console.log(input_status)

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
				$("#add_status_input").val('')
				$("#myStatuses").prepent(`
						<div class="post" data-statusid="{{$status->id}}">
							<div id="postData">
								
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

