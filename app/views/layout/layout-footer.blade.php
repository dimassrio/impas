		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script> -->
		<script type="text/javascript" src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
		<!--<script type="text/javascript" src="{{asset('assets/vendor/jquery-ui/ui/jquery-ui.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/underscore/underscore.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/fastclick/lib/fastclick.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/vendor/Lodash/dist/Lodash.min.js')}}"></script>-->
		<script type="text/javascript" src="{{asset('assets/vendor/foundation/js/foundation.min.js')}}"></script>
		<script>$(document).foundation();</script>
		<!-- Put New Javascript under @section('js') -->
		@yield('js')
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<!-- <script>
			(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
			function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
			e=o.createElement(i);r=o.getElementsByTagName(i)[0];
			e.src='//www.google-analytics.com/analytics.js';
			r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
			ga('create','UA-XXXXX-X');ga('send','pageview');
		</script> -->

	</body>
</html>