<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ asset('frontend/img/fav.png') }}">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Pengaduan Masyarakat</title>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
			<link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
		</head>
		<body>
            @include('sweetalert::alert')
		  <header id="header" id="home">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
							<ul>
							  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
							  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
							  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							  <li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
						</div>
						<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
							<a href="#"><span class="lnr lnr-phone-handset"></span> <span class="text">0812 3456 7890</span></a>
							<a href="#"><span class="lnr lnr-envelope"></span> <span class="text">support.pengaduan-masyarakat@gmail.com</span></a>
						</div>
					</div>
				</div>
		  	</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="/"><h4 class="text-white">PENGADUAN MASYARAKAT</h4></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
                        <li><a href="#home">HOME</a></li>
                        <li><a href="#lapor">LAPOR</a></li>
			            <li><a href="#tentang">TENTANG</a></li>
                        <li><a href="#cari">CARI</a></li>
                        <li><a href="#profil">PROFIL</a></li>
                        <li><a href="#galeri">GALERI</a></li>
                        <li><a href="/login" target="blank">LOGIN</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->
		    	</div>
		    </div>
		  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								Layanan Aspirasi dan Pengaduan Masyarakat
							</h1>
							<p class="pt-10 pb-10 text-white">
                                Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang
                            </p>
                            {{-- <a href="#lapor" class="primary-btn text-uppercase">Laporkan</a> --}}
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start contact-page Area -->
			<section class="contact-page-area section-gap" id="lapor">
				<div class="container">
                    <div class="title text-center">
                        <h1 class="mb-10">Sampaikan Laporan Anda</h1>
                        <p>Isi Laporan Anda di Form ini</p>
                    </div>
					<div class="row justify-content-center">
						<div class="col-lg-8">
                            <form action="{{ route('inputaspirasi.store') }}" method="POST" enctype="multipart/form-data" class="form-area contact-form text-right" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="nik" value="{{old('nik')}}" placeholder="Ketik NIK Anda" class="form-control @error('nik') is-invalid @enderror" style="border-radius: 0px">
                                    @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" style="border-radius: 0px">
                                        <option value=""> - Pilih Kategori - </option>
                                        @foreach(App\Models\Kategori::all() as $kategori)
                                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->ket_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lokasi" value="{{old('lokasi')}}" placeholder="Ketik Lokasi Kejadian" class="form-control @error('lokasi') is-invalid @enderror">
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ket" value="{{old('ket')}}" placeholder="Ketik Laporan Keterangan" class="form-control @error('ket') is-invalid @enderror">
                                    @error('ket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="feedback" class="form-control @error('feedback') is-invalid @enderror" style="border-radius: 0px">
                                        <option value=""> - Pilih Feedback - </option>
                                        {{-- @foreach(App\Models\Kategori::all() as $kategori) --}}
                                            <option value="Sangat Baik">😁</option>
                                            <option value="Cukup Baik">😄</option>
                                            <option value="Baik">🙂</option>
                                            <option value="Buruk">😞</option>
                                            <option value="Sangat Buruk">😖</option>
                                        {{-- @endforeach --}}
                                    </select>
                                    @error('feedback')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group text-center">
                                    <button class="primary-btn text-uppercase" type="submit">Submit</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			</section>
			<!-- End contact-page Area -->

            <!-- Start cta-one Area -->
            <section class="cta-one-area relative section-gap" id="tentang">
				<div class="container">
					<div class="overlay overlay-bg"></div>
					<div class="row justify-content-center">
						<div class="wrap">
							<h1 class="text-white">Tentang Pengaduan Masyarakat</h1>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis quis dolores necessitatibus, sed facere adipisci placeat incidunt, saepe atque, perspiciatis aliquid. Molestiae, doloribus! Eaque asperiores autem illo porro nam quia amet laboriosam minus fuga nisi vel similique, iure doloribus quisquam molestias ad quo dolorum. Quisquam laudantium inventore illum natus est odio, repudiandae aliquid voluptatibus iure ab corporis accusamus placeat laborum quod reprehenderit fugiat ullam consectetur adipisci autem velit perspiciatis optio error impedit culpa? Praesentium inventore amet dolor, provident maxime reiciendis minima quas, quisquam similique quasi voluptatum harum atque saepe unde tempora ipsa beatae, quaerat enim eaque vel cumque? Reprehenderit distinctio ex corporis dolore praesentium cum asperiores. Quasi officia obcaecati consectetur placeat alias illo sapiente, quaerat natus architecto ipsum! Porro fuga ratione quasi iure odio doloremque labore laudantium fugit, neque at vero eum laboriosam excepturi alias minus mollitia animi perferendis placeat nemo. Accusamus nam similique, necessitatibus fugiat accusantium alias minus est sapiente a reprehenderit sit maiores dolorum culpa quis? Unde debitis aliquid qui cum laborum repellat rem commodi consequuntur soluta deleniti, voluptas provident quo, blanditiis fuga iure labore quis tempore, porro beatae sit maiores sed dolorem. Necessitatibus consequatur at asperiores dolores perferendis ullam quia, omnis distinctio quam voluptate error, provident animi.
							</p>
							{{-- <p>
								Pengelola pengaduan pelayanan publik disetiap organisasi penyelenggara di Indonesia belum terkelola secara
                                efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak
                                terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu
                                pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya.
                                Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelola
                                pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara
                                Nasional.
							</p> --}}
						</div>
					</div>
				</div>
			</section>
            <!-- End cta-one Area -->

            <!-- Start contact-page Area -->
            <section class="contact-page-area section-gap" id="cari">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Cari Laporan berdasarkan NIK</h1>
                                <p>Ketik NIK dibawah ini untuk mencari laporan</p>
                                <form class="form" method="get" action="/">
                                    <div class="form-group">
                                        <input type="text" id="search" name="search" value="{{ old('search') }}" class="form-control" placeholder="ID Pelaporan" class="form-control" style="border-radius: 0px">
                                    </div>
                                    <button type="submit" class="genric-btn primary">Search</button>
                                </form>
							</div>
						</div>
                        <div class="menu-content pb-70 col-lg-8">
                            @if(count($inputaspirasi)>0)
                            @foreach($inputaspirasi as $key=>$m)
                                <div style="border-radius: 0px" class="card text-center">
                                    <div style="border-radius: 0px" class="card-header bg-dark">
                                        <h5><b>ID Pelaporan : {{ $m->id_pelaporan }}</b></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Kategori : {{ $m->aspirasi->kategori->ket_kategori }}</h5>
                                        <p class="card-text font-weight-bold">Lokasi : {{ $m->lokasi }}</p>
                                        <p class="card-text font-weight-bold">Keterangan : {{ $m->ket }}</p>
                                        <p class="card-text font-weight-bold">Status :
                                            @if($m->aspirasi->status == "menunggu")
                                            <span class="badge bg-primary text-light">
                                            {{$m->aspirasi->status}}
                                            </span>
                                            @elseif($m->aspirasi->status == "proses")
                                            <span class="badge bg-danger text-light">
                                            {{$m->aspirasi->status}}
                                            </span>
                                            @else
                                            <span class="badge bg-success text-light">
                                            {{$m->aspirasi->status}}
                                            </span>
                                            @endif
                                        </p>
                                        <p class="card-text font-weight-bold">Feedback : {{ $m->aspirasi->feedback }}</p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <h6><b>Tanggal Pelaporan : {{ $m->created_at }}</b></h6>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @else
                                <div class="container">
                                    <p class="text text-center">Tidak ada Laporan yang dapat ditampilkan.</p>
                                </div>
                            @endif
                        </div>
					</div>
				</div>
			</section>
            <!-- End blog Area -->

            <!-- Start cta-one Area -->
            <section class="cta-one-area relative section-gap" id="profil">
                <div class="container">
                    <div class="overlay overlay-bg"></div>
                    <div class="row justify-content-center">
                        <div class="wrap">
                            <h1 class="text-white">Profil Pengaduan Masyarakat</h1>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam perspiciatis tenetur debitis deserunt magni amet, deleniti ea pariatur voluptatum rerum. Sunt eius blanditiis corporis odit voluptates quod laudantium, illum voluptate nostrum voluptatibus mollitia ullam, totam sequi debitis qui veritatis dicta maxime eum consequatur ipsum enim sed sapiente. Libero expedita quia, harum sint deleniti dolorem. Eius harum ratione ipsa doloremque libero veniam iusto, ullam laborum quod maxime ipsam laboriosam impedit dolorum quam dolor sit nihil amet fugiat hic sapiente error tempora. Ducimus quasi accusamus itaque harum, minima culpa ipsa soluta voluptatum, velit ea nemo repellat rerum molestias, error doloribus a et aperiam esse nobis aut exercitationem rem voluptas ipsum. Corporis quaerat nemo sint natus excepturi aspernatur maxime asperiores necessitatibus sapiente repellat, nostrum aperiam tenetur delectus accusamus alias, distinctio recusandae vel ex aut laboriosam odio quia illum voluptates. Maiores natus neque ducimus, quas ullam incidunt quam ipsa nisi laborum tenetur quo illo culpa, exercitationem iusto aliquid nostrum fuga unde similique cum itaque sapiente, rem quia animi. Veritatis, nam ipsam amet distinctio ad illo eaque optio quasi culpa placeat natus quia, similique obcaecati inventore, maiores perspiciatis itaque quas in necessitatibus dolor temporibus? Vitae maxime consectetur labore ea eos mollitia consequuntur quibusdam deleniti quos?
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End cta-one Area -->

            <!-- Start Gallery Area -->
            <section class="gallery-area relative section-gap" id="galeri">
                <div class="container">
                    <div class="overlay overlay-bg"></div>
                    <div class="row justify-content-center">
                        <div class="wrap">
                            <h1 class="text-black text-center">Galeri</h1>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{ asset('frontend/img/gallery/waduk.jpeg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/waduk.jpeg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ asset('frontend/img/gallery/jalan rusak.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/jalan rusak.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum1.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum1.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum2.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum2.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum3.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/perbaikan-fasilitas-umum3.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                {{-- <div class="col-lg-5">
                                    <a href="{{ asset('frontend/img/gallery/g6.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/g6.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-7">
                                    <a href="{{ asset('frontend/img/gallery/g7.jpg') }}" class="img-gal">
                                        <div class="single-imgs relative">
                                            <div class="overlay overlay-bg"></div>
                                            <div class="relative">
                                                <img class="img-fluid" src="{{ asset('frontend/img/gallery/g7.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Gallery Area -->

            <!-- Start cta-two Area -->
            <section class="cta-two-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 cta-left">
							<h1>JUMLAH LAPORAN SEKARANG</h1>
						</div>
						<div class="col-lg-4 cta-right">
                            <h2 class="text-white">{{ totalInputAspirasi() }}</h2>
						</div>
					</div>
				</div>
			</section>
            <!-- End cta-two Area -->

			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					{{-- <div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Top Products</h4>
								<ul>
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Quick links</h4>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Features</h4>
								<ul>
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Brand Assets</a></li>
									<li><a href="#">Investor Relations</a></li>
									<li><a href="#">Terms of Service</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Resources</h4>
								<ul>
									<li><a href="#">Guides</a></li>
									<li><a href="#">Research</a></li>
									<li><a href="#">Experts</a></li>
									<li><a href="#">Agencies</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Newsletter</h4>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
									  <div class="input-group">
									    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									    <div class="input-group-btn">
									      <button class="btn btn-default" type="submit">
									        <span class="lnr lnr-arrow-right"></span>
									      </button>
									    </div>
									    	<div class="info"></div>
									  </div>
									</form>
								</div>
							</div>
						</div>
					</div> --}}
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://drkgtr36.github.io" target="_blank">DRKGTR36</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->


			<script src="{{ asset('frontend/js/vendor/jquery-2.2.4.min.js') }}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
            <script src="{{ asset('frontend/js/easing.min.js') }}"></script>
			<script src="{{ asset('frontend/js/hoverIntent.js') }}"></script>
			<script src="{{ asset('frontend/js/superfish.min.js') }}"></script>
			<script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
			<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    		<script src="{{ asset('frontend/js/jquery.tabs.min.js') }}"></script>
			<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
			<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
			<script src="{{ asset('frontend/js/mail-script.js') }}"></script>
			<script src="{{ asset('frontend/js/main.js') }}"></script>
		</body>
	</html>
