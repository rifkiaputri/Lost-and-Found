var posts = [];
function getNewPosts(type,id){
	$.ajax({
	  url: "api/posts.php",
	  type: "GET",
	  data: { post_type: type, post_top: "true" },
	  beforeSend: function(){
		$(id).append("<img src='img/ajax-loader.gif'>");
      },
	  success: function(data,status){
		if(status=="success"){
			$(id).html("");
			posts = JSON.parse(data);
			for(var i=0;i<posts.length;i++){
				if(i==0){ 
					var elem = '<div class="item active">';
				}else{
					var elem = '<div class="item">';
				}
				elem += '<h5>'+posts[i]['judul']+'</h5>';
				elem += '<p><i>'+posts[i]['username']+', '+posts[i]['tanggal']+'</i></p>';
				var s = posts[i]['konten'];
				if(s.length>60){ 
					s = s.substring(0,120); 
					elem += '<p>'+s+'...<br>';
				}else{
					elem += '<p>'+s+'<br>';
				}
				elem += '<a href="detailpost.php?id='+posts[i]['id']+'">Lihat selengkapnya</a></p>';
				elem += '</div>';
				$(id).append(elem);
			}
		}
	  }
	});
}