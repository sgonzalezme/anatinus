</head>
<body>

	<div id="wrapper clearfix">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" 
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<div style="padding: 10px">
					<a href="<?php echo site_url();?>"><img height="70"
						src="<?php //echo site_url("public/img/dfc-logo.png");?>"></a>
				</div>
			</div>

		</nav>
		

	</div>


		<!-- Page Content -->
	<div id="page-wrapper clearfix">
		<div class="container-fluid">
			<div class="list-group row left col-sm-3 col-md-2">
				<p class="list-group-item active">TEST</p>
				<a href="<?php echo site_url('/test/create')?>" class="list-group-item">Do test</a>
                <p class="list-group-item active">Load from Google</p>
                <a href="<?php echo site_url('/loadfromgoogle/create')?>" class="list-group-item">Load from Google</a>
            </div>

			<div class="row">
				<div class="left col-sm-9 col-md-10">