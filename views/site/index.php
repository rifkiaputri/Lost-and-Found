<?php

/* @var $this yii\web\View */

$this->title = 'Lost and Found';
?>
<div class="site-index">
    <div id="mycarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mycarousel" data-slide-to="1"></li>
            <li data-target="#mycarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item jumbotron active" id="jumbotron1">
                <h1>Mencari barang yang hilang?</h1>
                <p>Kamu berada di tempat yang tepat! Jelajahi Lost and Found untuk mencari dan menemukan informasi mengenai barang-barang yang hilang.</p>
                <p><a class="btn btn-primary btn-lg" id="toDesc" role="button">Pelajari lebih lanjut &raquo;</a></p>
            </div>
            <div class="item jumbotron" id="jumbotron2">
                <h1>Lebih mudah berbagi informasi</h1>
                <p>Pencarian barang maupun orang hilang menjadi lebih mudah dengan jaringan sosial yang luas dan dibantu fitur-fitur 
                lengkap pada aplikasi Lost and Found.</p>
                <p><a class="btn btn-primary btn-lg" id="toFeatures" role="button">Fitur Lost and Found &raquo;</a></p>
            </div>
            <div class="item jumbotron" id="jumbotron3">
                <h1>Unduh juga aplikasi mobile-nya!</h1>
                <p>Selain pada platform Web, aplikasi Lost and Found juga tersedia pada platform Mobile. Silakan unduh aplikasinya pada 
                Google Play atau dengan klik tombol download di bawah ini.</p>
                <p><a class="btn btn-primary btn-lg" id="toMobile" role="button">Download for Android</a></p>
            </div>
        </div>
    </div>
    <!-- Container -->
    <div class="container">
        <div class="col-md-6">
          <div class="widget-newlost">
            <h2>Berita Kehilangan Terbaru</h2>
            <div id="carousel-lost" class="carousel-widget slide vertical" data-ride="carousel">
                <div id="newlost" class="carousel-inner"></div>
            </div>
            <div class="widget-footer">
                <a href="#" class="glyphicon glyphicon-chevron-left" onclick="javascript:$('#carousel-lost').carousel('prev')"></a>
                <a href="#" class="glyphicon glyphicon-chevron-right" onclick="javascript:$('#carousel-lost').carousel('next')"></a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="widget-newfound">
            <h2>Berita Penemuan Terbaru</h2>
            <div id="carousel-found" class="carousel-widget slide vertical" data-ride="carousel">
                <div id="newfound" class="carousel-inner"></div>
            </div>
            <div class="widget-footer">
                <a href="#" class="glyphicon glyphicon-chevron-left" onclick="javascript:$('#carousel-found').carousel('prev')"></a>
                <a href="#" class="glyphicon glyphicon-chevron-right" onclick="javascript:$('#carousel-found').carousel('next')"></a>
            </div>
          </div>
        </div>
    </div>
    <div class="description">
        <div class="col-md-10 col-md-offset-1">
            <h2>Apa itu Lost and Found?</h2>
            <p style="text-align:justify;">Lost and Found adalah aplikasi sosial media berplatform Web dan Android yang memfasilitasi para penggunanya untuk 
            berbagi informasi mengenai kehilangan atau penemuan barang maupun orang. Aplikasi ini dapat memudahkan masyarakat 
            dan wisatawan Bandung untuk mencari dan menemukan barang atau kerabat yang hilang.</p>
            <h2>Bagaimana cara menemukan barang yang hilang?</h2>
            <div class="col-md-3">
                <div class="center-img"><img src="img/icon_question.png"></div>
                <p class="dstep">1. Barang anda tertinggal di tempat publik (seperti ATM) atau terjatuh entah dimana bahkan mungkin mengalami kecurian</p>
            </div>
            <div class="col-md-3">
                <div class="center-img"><img src="img/icon_laptop.png"></div>
                <p class="dstep">2. Buka laman Lost and Found, daftarkan diri anda bila belum memiliki akun kemudian login</p>
            </div>
            <div class="col-md-3">
                <div class="center-img"><img src="img/icon_spread.png"></div>
                <p class="dstep">3. Tulis berita kehilangan anda selengkap mungkin agar orang-orang tahu dan bisa membantu mencarikan</p>
            </div>
            <div class="col-md-3">
                <div class="center-img"><img src="img/icon_handshake.png"></div>
                <p class="dstep">4. Dengan jaringan sosial yang luas, barang anda akan lebih cepat ditemukan dengan bantuan pengguna Lost and Found yang lain</p>
            </div>
            <h2>Keunikan aplikasi Lost And Found</h2>
            <h5> > Media sosial pertama yang memfasilitasi pertukaran informasi khusus kehilangan barang di kota Bandung!</h5>
            <h5> > Lebih mudah untuk menemukan barang maupun orang yang hilang dengan fasilitas comment and private message</h5>
            <h5> > Memiliki fasilitas pelacakan barang yang hilang berdasarkan informasi yang diberikan oleh pengguna lain</h5>
        </div>
    </div>
    <div class="features">
        <div class="col-md-10 col-md-offset-1">
            <h2>Fitur-fitur yang ada di Lost and Found</h2>
            <br>
            <div class="col-md-4">
                <div class="center-img"><img src="img/mobile.png" width="100%"></div>
            </div>
            <div class="col-md-4 features-desc">
                <p><img src="img/home-icon.png"> HOME</p>
                <p><img src="img/mypost-icon.png"> MY POST</p>
                <p><img src="img/message-icon.png"> PRIVATE MESSAGE</p>
            </div>
            <div class="col-md-4 features-desc">
                <p><img src="img/post-icon.png"> WRITE POST</p>
                <p><img src="img/profile-icon.png"> PROFILE</p>
                <p><img src="img/tracking-icon.png"> TRACKING</p>
            </div>
        </div>
    </div>
    <div class="mobile-download">
        <div class="col-md-10 col-md-offset-1">
            <h2>Download for Android</h2>
            <p style="text-align:justify;">Selain pada platform Web, aplikasi Lost and Found juga tersedia pada platform Mobile. Silahkan unduh aplikasinya pada 
            Google Play atau dengan mengklik tombol download dibawah ini.</p>
            <center><a href="download-android.php"><img src="img/btn-download-android.png"></a></center>
            <br><br>
            <p>*info: saat ini, aplikasi dalam platform Android masih dalam tahap pengembangan dan belum bisa diunduh.</p>
        </div>
    </div>
    
</div>
