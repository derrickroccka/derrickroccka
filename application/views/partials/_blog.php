<?php $data = array(
	"section_title" => "Blog",
); 
$html = file_get_contents('http://www.derrickroccka.com/blog/');
preg_match("'<h2 class=\"post-title\">(.*?)</h2>'", $html, $display);

?>
<section id="blog-container" class="section">
	<?php echo partial('partials/_section-header', $data) ?>
	<style>
		.blog-title a{color: #444; text-decoration: none;}
		.blog-title:hover a{color: #cf7aab;}
	</style>
	<p style="font-size: 7rem;text-align:center; margin-top: 15%;color: #444;" class="blog-title"><?php echo $display[1];?></p>
</section>