/* onload function */
$(document).ready(function(){
	//fade in/out based on scrollTop value
	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('#scroller').fadeIn();
		} else {
			$('#scroller').fadeOut();
		}
	});
	// scroll body to 0px on click
	$('#scroller').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 400);
		return false;
	});
});

/* Main function */
var posts = [];
var user = [];
function getPosts(type){
	$.ajax({
	  url: "api/posts.php",
	  type: "GET",
	  data: { post_type: type },
	  beforeSend: function(){
		$(".timeline").append("<center><img src='img/ajax-loader.gif'></center>");
      },
	  success: function(data,status){
		if(status=="success"){
			$(".timeline").html("");
			posts = JSON.parse(data);
			for(var i=0;i<posts.length;i++){
				var elem = '<div class="panel panel-info"><div class="panel-heading">';
				elem += '<a href="detailpost.php?id='+posts[i]['id']+'"><h2>'+posts[i]['judul']+'</h2></a>';
				elem += '<p><i>'+posts[i]['username']+', '+posts[i]['tanggal']+'</i></p></div><div class="panel-body">';
				if(posts[i]['foto_konten']!=null && posts[i]['foto_konten']!=""){
					elem += '<div class="post-img"><img src="images/'+posts[i]['foto_konten']+'"></div>';
				}
				elem += '<p>'+posts[i]['konten']+'</p>';
				elem += '</div>';
				elem += '<div class="panel-footer"><div class="row"><div class="col-md-6"><div class="post-label">';
				if(posts[i]['tipe']==0){
					elem += '<span class="label label-danger">LOST</span></div>';
				}else{
					elem += '<span class="label label-success">FOUND</span></div>';
				}
			    elem +=	'</div><div class="col-md-6"><div class="post-icon right-align">';
				elem += '<a href="tracking.php?id='+posts[i]['id']+'"><span class="glyphicon glyphicon-screenshot"></span></a>';
				elem += '<a href="new-messages.php?to='+posts[i]['username']+'"><span class="glyphicon glyphicon-envelope"></span></a>';
				elem += '<a href="detailpost.php?id='+posts[i]['id']+'"><span class="glyphicon glyphicon-comment"></span></a>';
				elem += '</div></div></div></div></div>';
				$(".timeline").append(elem);
			}
		}
	  }
	});
}

function getMyPost(){
	$.ajax({
	  url: "api/mypost.php",
	  type: "POST",
	  beforeSend: function(){
		$(".timeline").append("<center><img src='img/ajax-loader.gif'></center>");
      },
	  success: function(data,status){
		if(status=="success"){
			$(".timeline").html("");
			posts = JSON.parse(data);
			for(var i=0;i<posts.length;i++){
				var elem = '<div class="panel panel-info"><div class="panel-heading">';
				elem += '<a href="detailpost.php?id='+posts[i]['id']+'"><h2>'+posts[i]['judul']+'</h2></a>';
				elem += '<p><i>'+posts[i]['username']+', '+posts[i]['tanggal']+'</i></p></div><div class="panel-body">';
				if(posts[i]['foto_konten']!=null && posts[i]['foto_konten']!=""){
					elem += '<div class="post-img"><img src="images/'+posts[i]['foto_konten']+'"></div>';
				}
				elem += '<p>'+posts[i]['konten']+'</p>';
				elem += '</div>';
				elem += '<div class="panel-footer"><div class="row"><div class="col-md-6"><div class="post-label">';
				if(posts[i]['tipe']==0){
					elem += '<span class="label label-danger">LOST</span></div>';
				}else{
					elem += '<span class="label label-success">FOUND</span></div>';
				}
			    elem +=	'</div><div class="col-md-6"><div class="post-icon right-align">';
				elem += '<a href="tracking.php"><span class="glyphicon glyphicon-screenshot"></span></a>';
				elem += '<a href="new-messages.php"><span class="glyphicon glyphicon-envelope"></span></a>';
				elem += '<a href="detailpost.php"><span class="glyphicon glyphicon-comment"></span></a>';
				elem += '</div></div></div></div></div>';
				$(".timeline").append(elem);
			}
		}
	  }
	});
}

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

function getProfile(){
	$.ajax({
	  url: "api/profile.php",
	  type: "POST",
	  beforeSend: function(){
		$(".user-info").append("<center><img src='img/ajax-loader.gif'></center>");
      },
	  success: function(data,status){
		if(status=="success"){
			$(".user-info").html("");
			user = JSON.parse(data);
			var elem = '<div class="row"><div class="col-xs-6 col-md-4"><span id="foto" style="float:left">';
			if(user[0]['foto']=="" || user[0]['foto']==null){
				elem += '<img src="images/default.jpg"></span></div>';
			}else{
				elem += '<img src="images/'+user[0]['foto']+'"></span></div>';
			}
			elem += '<div class="col-xs-6 col-md-6">';
			elem += '<p><h4>Nama Lengkap:</h4></p>';
			elem += '<p><h2 id="nama">'+user[0]['nama']+'</h2></p>';
			elem += '<p><h4><br>Username:</h4></p>';
			elem += '<p><h2 id="user_profile">@'+user[0]['username']+'</h2></p>';
			elem += '</div></div><hr><p><h4>Basic Info</h4></pre>';
			elem += '<p id="nomorhp">Tanggal Lahir: '+user[0]['tanggal_lahir']+'</p>';
			elem += '<p id="alamat">Alamat: '+user[0]['alamat']+'</p>';
			elem += '<span class="input-group-btn right-align">';
			elem += '<a class="btn btn-success" type="button" href="editprofile_form.php">Edit Profil</a></span>';
			$(".user-info").append(elem);
		}
	  }
	});
}

function getSearchResult(q){
	$.ajax({
	  url: "api/search.php",
	  type: "GET",
	  data: {query:q},
	  beforeSend: function(){
		$(".timeline").append("<center><img src='img/ajax-loader.gif'></center>");
      },
	  success: function(data,status){
		if(status=="success"){
			$(".timeline").html("");
			$(".timeline").append("<h4>Menampilkan hasil pencarian untuk: <b>"+q+"</b></h4><br>");
			posts = JSON.parse(data);
			if(posts.length == 0) {
				$(".timeline").append("<p>Tidak ditemukan.</p>");
			} else {
				for(var i=0;i<posts.length;i++){
					var elem = '<div class="panel panel-info"><div class="panel-heading">';
					elem += '<a href="detailpost.php?id='+posts[i]['id']+'"><h2>'+posts[i]['judul']+'</h2></a>';
					elem += '<p><i>'+posts[i]['username']+', '+posts[i]['tanggal']+'</i></p></div><div class="panel-body">';
					if(posts[i]['foto_konten']!=null && posts[i]['foto_konten']!=""){
						elem += '<div class="post-img"><img src="images/'+posts[i]['foto_konten']+'"></div>';
					}
					elem += '<p>'+posts[i]['konten']+'</p>';
					elem += '</div>';
					elem += '<div class="panel-footer"><div class="row"><div class="col-md-6"><div class="post-label">';
					if(posts[i]['tipe']==0){
						elem += '<span class="label label-danger">LOST</span></div>';
					}else{
						elem += '<span class="label label-success">FOUND</span></div>';
					}
				    elem +=	'</div><div class="col-md-6"><div class="post-icon right-align">';
					elem += '<a href="tracking.php?id='+posts[i]['id']+'"><span class="glyphicon glyphicon-screenshot"></span></a>';
					elem += '<a href="new-messages.php"><span class="glyphicon glyphicon-envelope"></span></a>';
					elem += '<a href="detailpost.php?id='+posts[i]['id']+'"><span class="glyphicon glyphicon-comment"></span></a>';
					elem += '</div></div></div></div></div>';
					$(".timeline").append(elem);
				}
			}
		}
	  }
	});
}
