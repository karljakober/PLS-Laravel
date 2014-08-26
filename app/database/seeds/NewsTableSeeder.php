<?php

class NewsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('news')->delete();
		News::create(array(
			'title' => 'First News Article',
			'author_id' => '1',
			'content' => "Art party Kickstarter American Apparel Neutra whatever. Blog tousled squid vegan, Wes Anderson Kickstarter bitters tattooed direct trade lo-fi ethical High Life fixie. Carles keytar plaid, Pinterest hoodie master cleanse cliche cred food truck pug Wes Anderson lo-fi. +1 gastropub Pinterest normcore, readymade PBR forage Schlitz iPhone pour-over cliche Tumblr literally Thundercats next level. Brooklyn narwhal street art, 8-bit normcore McSweeney's crucifix +1. Cornhole trust fund Helvetica, vinyl 90's messenger bag single-origin coffee Cosby sweater seitan four loko lomo cardigan brunch. Tousled meggings chambray actually.<br />Tonx yr Marfa bicycle rights, Helvetica try-hard Bushwick +1 deep v 3 wolf moon Pinterest plaid. Hella small batch forage salvia, Portland Bushwick locavore. Flexitarian farm-to-table pour-over mustache bicycle rights PBR. Aesthetic scenester deep v leggings tattooed flannel. Bushwick aesthetic pour-over, letterpress you probably haven't heard of them Pinterest ugh twee photo booth Williamsburg hella single-origin coffee put a bird on it. 8-bit artisan High Life Thundercats, flannel post-ironic yr Portland iPhone lomo forage Bushwick vinyl. Quinoa trust fund High Life seitan wolf VHS."
		));
		sleep(1);
		News::create(array(
			'title' => 'Second News Article',
			'author_id' => '1',
			'content' => "Sustainable four loko PBR&B salvia Godard ethical. Ethnic flexitarian kitsch, pork belly XOXO literally High Life messenger bag 90's fashion axe scenester street art. High Life selvage messenger bag, meggings cray typewriter Kickstarter before they sold out hella. Marfa PBR&B PBR cornhole freegan selfies gastropub, DIY Tumblr pickled. Freegan sriracha photo booth retro. Semiotics single-origin coffee paleo sartorial, fixie Cosby sweater Intelligentsia pop-up cray Kickstarter put a bird on it. Artisan keffiyeh fap Carles, banh mi skateboard fixie iPhone.<br />Ennui fanny pack raw denim freegan Marfa tofu. Gastropub 3 wolf moon fap bitters. Biodiesel gentrify tote bag freegan pickled. Chia banjo flannel Neutra salvia. Neutra meggings deep v, drinking vinegar kale chips you probably haven't heard of them flexitarian pug quinoa banh mi XOXO vinyl. Master cleanse freegan Pitchfork, post-ironic ugh fixie Austin beard PBR&B. Etsy selvage retro slow-carb, next level forage fap flannel scenester readymade aesthetic farm-to-table."
		));
		sleep(1);
		News::create(array(
			'title' => 'Third News Article',
			'author_id' => '1',
			'content' => "Swag master cleanse paleo iPhone synth. PBR deep v umami, PBR&B tousled photo booth 3 wolf moon disrupt cray put a bird on it. Schlitz artisan yr, raw denim food truck bespoke Carles whatever chillwave kale chips slow-carb hella. Tattooed fashion axe sustainable chia authentic pop-up. Leggings Godard VHS gastropub, salvia Tumblr twee Banksy deep v vinyl. Slow-carb ethical typewriter direct trade you probably haven't heard of them Vice, bespoke ennui fanny pack small batch quinoa food truck cray yr. Tumblr beard crucifix, disrupt Cosby sweater slow-carb +1 deep v Godard fap.<br />Tofu Shoreditch whatever McSweeney's narwhal. Wayfarers gentrify Portland, tattooed distillery Vice keffiyeh Etsy cornhole fingerstache seitan kitsch master cleanse whatever crucifix. Forage bespoke Pitchfork, Bushwick tattooed hella bitters Tumblr pour-over hoodie. Four loko freegan food truck, cornhole VHS beard +1 locavore viral Bushwick XOXO Intelligentsia. Shabby chic disrupt 3 wolf moon whatever Cosby sweater kale chips. Echo Park post-ironic PBR&B, bitters actually ennui Williamsburg pork belly sustainable asymmetrical. Marfa leggings Thundercats selfies skateboard, meh actually yr paleo food truck forage pug DIY next level."
		));
		sleep(1);
		News::create(array(
			'title' => 'Welcome to PLS',
			'author_id' => '1',
			'content' => 'This is the dev version of the Pong Lan Software. Welcome!'
		));
	}

}
