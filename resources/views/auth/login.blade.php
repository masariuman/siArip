<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Sistem Arsip Pegawai</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Sistem Arsip Pegawai BKPSDM">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="/hando/css/style.css" rel='stylesheet' type='text/css' />
	<!-- online fonts-->
	<link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i" rel="stylesheet">
</head>

<body>
	<!--  particles  -->
	<div id="particles-js"></div>
	<!-- //particles -->
	<div class="w3ls-pos">
		<h1>Sistem Arisp Pegawai</h1>
        <img src="/hando/images/logo.png"  class="logo"/>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
		<div class="w3ls-login box">
			<!-- form starts here -->
			<form action="{{ route('login') }}" method="post">
                @csrf
				<div class="agile-field-txt">
					<input type="text" name="nip" placeholder="Masukkan NIP" required=""/>
				</div>
				<div class="agile-field-txt">
					<input type="password" name="password" placeholder="Masukkan Password" required="" id="myInput" />
				</div>
				<div class="w3ls-bot">
					<input type="submit" value="LOGIN">
				</div>
			</form>
		</div>
		<!-- //form ends here -->
		<!--copyright-->
		<div class="copy-wthree">
			<p>© 2021 <a href="http://masariuman.com/" target="_blank">Arif Setiawan</a>. All Rights Reserved</p>
		</div>
		<!--//copyright-->
	</div>
	<!-- scripts required  for particle effect -->
	<script src='/hando/js/particles.min.js'></script>
	<script src="/hando/js/index.js"></script>
	<!-- //scripts required for particle effect -->
</body>

</html>
