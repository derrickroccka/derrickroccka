<?php $data = array(
	"section_title" => "Enterprise",
); ?>
<section id="enterprise-container" class="section" data-3000="opacity:1;top:3%;transform:rotate(0deg);transform-origin:0 0;" data-3500="opacity:0;top:-10%;transform:rotate(270deg);">
	<div data-2100="top:3%;transform:rotate(0deg);transform-origin:0 0;" data-2300="top:-10%;transform:rotate(65deg);" 
	data-2300="top:3%;transform:rotate(65deg);transform-origin:0 0;" data-2450="top:-10%;transform:rotate(10deg);"
	data-2450="top:3%;transform:rotate(10deg);transform-origin:0 0;" data-2500="top:-10%;transform:rotate(25deg);">
		<?php echo partial('partials/_section-header', $data) ?>
	</div>
	<div id="enterprise-range" class="noUiSlider horizontal">
		
	</div>
	<p id="enterprise-range-value">Now</p>
	<p id="enterprise-text"></p>
</section>
<?php 

/*
*TODO re-enable partial in home.php
*TODO re-enable less compilation of ui and enterprise
*TODO re-enable 2 less files in global.less
*TODO re-enable script in skeleton
*/
?>