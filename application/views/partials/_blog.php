<?php $data = array(
	"section_title" => "Blog",
); 
$html = file_get_contents('http://www.derrickroccka.com/blog/');
preg_match("'<h2 class=\"post-title\">(.*?)</h2>'", $html, $display);

?>
<section id="blog-container" class="section">
	<?php echo partial('partials/_section-header', $data) ?>
	<p style="font-size: 10rem;text-align:center; margin-top: 15%;color: #444;"><?php echo $display[1];?></p>
</section>