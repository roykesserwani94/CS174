<?php

	require 'simple_html_dom.php';
	$topNews = array();
	$url = $image = $title = $info = "";

				$html = file_get_html('http://games.espn.go.com/frontpage/football');
						foreach($html->find('.mod-content') as $content_section){
							foreach($content_section->find('.mod-tab-content') as $topStories){

								foreach($topStories->find('.top-story-image') as $topStoryDiv){
									foreach($topStoryDiv->find('a') as $a){
										$url = $a->href;
									}
									foreach($topStoryDiv->find('img') as $img){
										$image = $img->src;
									}
								}
								foreach($topStories->find('.top-story-headline') as $topStoryHeadline){
									foreach($topStoryHeadline->find('h2') as $tempTitle){
										$title = $tempTitle->innertext;
									}
									foreach($topStoryHeadline->find('p') as $description){
										$info =  explode("Read", strip_tags($description->innertext));
									}
								}
								array_push($topNews, array('title' => $title, 'image' => $image, 'description' => $info[0], 'url' => $url));

								foreach($topStories->find('.mod-mem-carousel') as $carousel){
									foreach($carousel->find('ul li') as $li){
										$topStoryDiv = $li->children(0);
								 	  $href= $topStoryDiv->children(0);
										$url = $href->href;
										foreach($href->find('img') as $img){
											$image = $img->src;
										}
										foreach($href->find('h3') as $h3){
											$title = $h3->innertext;
										}
										array_push($topNews, array('title' => $title, 'image' => $image, 'description' => null, 'url' => $url));
									}
								}
							}
						}
						echo json_encode($topNews);

?>
