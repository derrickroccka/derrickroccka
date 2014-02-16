<?php $data = array(
	"section_title" => "Thanks for your visit :)",
); ?>
<section data-anchor-target="#hire-form" data-0="background:rgba(178, 9, 8, 1);" data-top-bottom="background:rgba(255, 255, 255, 1);"
id="share-container" class="section">
	<?php echo partial('partials/_section-header', $data) ?>
	<p id="share-smile">&#9786;</p>
	<p id="share-ops_text">You can share it via...</p>
	<div id="share-social_container">
		<div id="share-social">
			<a data-anchor-target="#share-ops_text" data-0="bottom[bounce]:180%" data-top-bottom="bottom:0%"
			id="share-social_item_fb" class="share-social_item fb" href="http://www.facebook.com/share.php?u=http://www.derrickroccka.com&title=Derrick%20Roccka%20is%20here" 
			rel="nofollow" target="_blank" /></a>

			<a data-anchor-target="#share-ops_text" data-0="bottom[bounce]:150%" data-top-bottom="bottom:0%"
			id="share-social_item_gp" class="share-social_item gp" href="https://plus.google.com/share?url=http://www.derrickroccka.com" 
			rel="nofollow" target="_blank" /></a>

			<a data-anchor-target="#share-ops_text" data-0="bottom[bounce]:130%" data-top-bottom="bottom:0%"
			id="share-social_item_tw" class="share-social_item tw" href="http://twitter.com/home?status=Derrick%20Roccka%20is%20here%20%40DeRoccka+http://www.derrickroccka.com" 
			rel="nofollow" target="_blank" /></a>

			<a data-anchor-target="#share-ops_text" data-0="bottom[bounce]:135%" data-top-bottom="bottom:0%" 
			id="share-social_item_email" class="share-social_item email" href="mailto:?Subject=%20Derrick%20Roccka%20is%20awesome" rel="nofollow" target="_blank" /></a>
		</div>
	</div>
	<figure id="share-derrick_face">
		<img title="This is Derrick Roccka" alt="This is Derrick Roccka" src="<?php echo IMAGES.'derrick-face.png' ?>">
	</figure>
	<span data-anchor-target="#share-social_item_email" data-0="bottom[cubic]:100%" data-100-top-bottom="bottom:0%" 
	id="share-hard_work_that" class="share-text-bottom">Hard work that</span><br/>
	<span data-anchor-target="#share-social_item_email" data-0="left:100%" data-top="left:0%" 
	id="share-you_should_fork" class="share-text-bottom">You should fork!</span>
	<div id="share-fork">
		<figure id="share-fork_icon" data-anchor-target="#share-you_should_fork" data-0="opacity:-7" data-top="opacity: 1">
			<a href="http://github.com/derrickroccka">
				<img title="Fork me on GitHub" alt="Fork me on GitHub" src="<?php echo IMAGES.'github.png' ?>">
			</a>
		</figure>
	</div>
</section>