<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title><?php echo $title ?></title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php echo $description ?>" />
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

	<meta name="author" content="<?php echo $author ?>" />

	<link rel="stylesheet" href="<?php echo base_url(CSS."global.css");?>">

	<!-- extra CSS-->
	<?php foreach($css as $c):?>
	<link rel="stylesheet" href="<?php echo base_url().CSS.$c?>">
	<?php endforeach;?>

	<!-- extra fonts-->
	<?php foreach($fonts as $f):?>
		<link href="http://fonts.googleapis.com/css?family=<?php echo $f?>"
		rel="stylesheet" type="text/css">
	<?php endforeach;?>
	<!-- extra fonts2-->
	<?php foreach($fonts2 as $f):?>
		<link href="<?php echo FONTS.$f?>" rel="stylesheet" type="text/css">
	<?php endforeach;?>

	<!-- Le fav and touch icons -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url(IMAGES.'ico/favicon.ico');?>"> -->
</head>
<body id="skrollr-body">
	<!-- Facebook -->

	<!-- Backbone Templates -->
	<script id="projectTemplate" type="text/template">
		<h2><%= name %><h2>
    </script>
    <script id="projectShowTemplate" type="text/template">
	    <div id="projects-info">
		    <ul>
		    	<h3><img src="<?php echo IMAGES ?>category.png" />&nbsp;&nbsp;Category</h3>
		    	<li class="project-cat"><%= cat %></li>
			    <h3><img src="<?php echo IMAGES ?>what-did-i-use.png" />&nbsp;&nbsp;What did you use?</h3>
			    <li class="project-tech"><%= tech %></li>
			    <h3><img src="<?php echo IMAGES ?>progress.png" />&nbsp;&nbsp;Progress</h3>
			    <li class="project-progress-title"><span style="font-size:2em"><%= progress %>%</span></li>
			    <li class="project-progress-bar" style="width:<%= progress %>%; height: 20px;"></li>
			    <h3><img src="<?php echo IMAGES ?>where-can-i-find-it.png" />&nbsp;&nbsp;Where can I find it?</h3>
			    <li class="project-url"><a href="<%= url %>" title="<% name %>"><%= url %></a></li>
		    </ul>
	    </div>
    </script>
    <script id="projectsFilterTemplate" type="text/template">
		<span><%= name %></span>
    </script>
    <script id="formItemTemplate" type="text/template">
	
    </script>
	<!-- echoes all the content -->
	<div id="container">
		<?php echo $body ?>
	</div>
	
	<!-- Scripts -->
	<script	src="<?php echo base_url(JSLIBS."jquery-1.10.2.min.js");?>"></script>
	<script src="<?php echo base_url(JSLIBS."underscore-min.js");?>"></script>
	<script src="<?php echo base_url(JSLIBS."backbone-min.js");?>"></script>
	<script src="<?php echo base_url(JSLIBS."test.js");?>"></script>

	<!-- More JS Libs -->
	<?php foreach($javascript as $js):?>
		<script src="<?php echo base_url().JSLIBS.$js?>"></script>
	<?php endforeach;?>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<!-- Sections JS -->
	<?php foreach($section as $js):?>
		<script src="<?php echo base_url().JSSECTIONS.$js?>"></script>
	<?php endforeach;?>

	<!-- Parallax Skrollr-->
	<script>
		var s = skrollr.init({
			edgeStrategy: 'set',
			easing: {
				WTF: Math.random,
				inverted: function(p) {
					return 1-p;
				}
			}
		});
	</script>
    <!-- google analytics script -->
    
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-44249146-1']);
    _gaq.push(['_trackPageview']);

    (function() {
    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
	<!-- Modernizr -->
	<script async defer src="<?php echo base_url(JS."libs/modernizr-2.6.2.min.js");?>"></script>
</body>
</html>
