<?php $data = array(
	"section_title" => "Hello! My name is Derrick Roccka",
); ?>
<section id="derrick-container" class="section">
	<?php echo partial('partials/_section-header', $data) ?>

	<figure id="derrick-logo-center">
		<img id="derrick-logo" title="Derrick Roccka logo" src="<?php echo IMAGES.'derrick-roccka_logo.png' ?>" />
		<figcaption id="derrick-caption-init">Derrick Roccka</figcaption>
		<figcaption id="derrick-caption-contact">
			<a href="" class="derrick-caption-contact_item phone" rel="nofollow" target="_blank" /></a>
			<a href="mailto:hello@derrickroccka.com?Subject=Hello%20Derrick%20Roccka" class="derrick-caption-contact_item email" rel="nofollow" target="_blank" /></a>
			<a href="https://plus.google.com/u/0/115250651317119792977/" class="derrick-caption-contact_item gp" rel="nofollow" target="_blank" /></a>
			<a href="https://twitter.com/DeRoccka" class="derrick-caption-contact_item tw" rel="nofollow" target="_blank" /></a>
		</figcaption>
	</figure>
	<article id="about-me">
	<br/><p>
		<figure id="about-me_who" class="about-me_icon"></figure><h2>Who is Derrick Roccka?</h2>
		Derrick Roccka is the alter ego of Juan C. Persistance H. It's as simple as that. Born in Barcelona in 1990, he's been seriously involved in web app development since 2010. He ended school in 2008 and has done a lot of things after that. He started a career in Computer Engineering, but a few months later, decided to quit. It was time to turn a new leaf for him, so he tried to become a sound engineer. This was an fun hobby but he needed something different. Revisiting his old programming books, he submerged himself and began to create art over the web. Fortunately, there was a man who put him on the right path, and well, here he is enjoying every day of hard work.
	</p><br/>
	<p>
		<figure id="about-me_love" class="about-me_icon"></figure><h2>What does he love?</h2>
		Derrick loves a lot of things. Above all, he loves football and learning something new everyday. He's absolutely mad about increasing his knowledge and coming up with new ideas. He's recently been dealing with God in order to get days of 48 hours, but it seems that they have not agreed yet. 
	</p><br/>
	<p>
		<figure id="about-me_do" class="about-me_icon"></figure><h2>What does he do?</h2>
		Well, Derrick is triying to be a really complete web developer and he is able to stay all day looking for the best way to write each piece of code. He likes both front-end and back-end development, so at this moment he's not specialised in any of this fields. <br/>Although 3 years are not too much, he learns fast and is capable of almost everything. He is now working at impactdigital.es, but he's always doing extra hours at home.
	</p><br/>
	<p>
		<figure id="about-me_use" class="about-me_icon"></figure><h2>What does he use?</h2>
		Each project is different, so he is not closed in a particular technology. Derrick uses different languages, tools and methodologies when programming and he is constantly looking for new ones.
		Here is a little list:
		<h3>Languages</h3>
		<ul class="languages">
			<li>CSS3</li>
			<li>HTML5</li>
			<li>Java</li>
			<li>JavaScript</li>
			<li>PHP</li>
		</ul>
		<h3>Frameworks & libs such as...</h3>
		<ul class="frameworks">
			<li>Backbone</li>
			<li>Bootstrap 2</li>
			<li>Cardinal CSS</li>
			<li>CodeIgniter</li>
			<li>dForm</li>
			<li>jQuery</li>
		</ul>
		<h3>CMS</h3>
		<ul class="cmss">
			<li>Prestashop</li>
			<li>Wordpress</li>
		</ul>
		<h3>Some tools, IDE's and preprocessors like...</h3>
		<ul class="tools">
			<li>Adobe Reflow</li>
			<li>Aptana Studio 3</li>
			<li>Eclipse</li>
			<li>Emmet</li>
			<li>LESS</li>
			<li>Skrollr</li>
			<li>Sublime Text 2</li>
		</ul>
		<h3>Comming soon</h3>
		<ul class="learning">
			<li>Express</li>
			<li>Firefox OS</li>
			<li>NodeJS</li>
			<li>pjax</li>
			<li>Socket.io</li>
		</ul>
	</p><br/>
	</article>
</section>
<?php if($mobile == true) { ?>
<div id="derrick-alerts"><strong>Shake your device, click here or click the big R</strong></div>
<div class="clear clearfix"></div>
<?php } ?>