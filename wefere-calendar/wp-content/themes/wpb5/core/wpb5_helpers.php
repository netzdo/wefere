<?php
function star_dust($val){

	if(!$val){
		$val = 0;
	}
	if($val == 0){
		$val = 5;
	}

	if($val > 5){
		$val = $val /2;
	}
	$html = '';
	$valFloor = floor($val);
	$valDiff = $val - $valFloor;
	$valRound = round($val);
	$countStars = 0;
	$html .= '<div class="star-dust">';

	for ($i=0; $i < $valFloor; $i++) {
		$html .= '<span><i class="fas ghost fa-star"></i><i class="fas fa-star on"></i></span>';
		$countStars++;
	}
	if($valDiff >= 0.75){
		$html .= '<span><i class="fas ghost fa-star"></i><i class="fas fa-star-half on"></i></span>';
		$countStars++;
	}else{
		if($valDiff >= 0.25){
			$html .= '<span><i class="fas ghost fa-star"></i><i class="fas fa-star-half"></i></span>';
			$countStars++;
		}
	}
	if($countStars < 5){
		for ($j=0; $j < 5-$countStars; $j++) {
			$html .= '<span><i class="fas ghost fa-star"></i><i class="fas fa-star"></i></span>';
		}
	}
	$html .= '</div>';

	return $html;
}

function wpb5_thumbnail($p_ID = '', $size = ''){
	if($p_ID == ''){
		$p_ID = get_the_ID();
	}
	if($size == ''){
		$size = 'post-thumbnail';
	}
	if(has_post_thumbnail($p_ID)){
		$image = get_the_post_thumbnail_url($p_ID, $size);
	}else{
		$image = get_g_field('post_thumbnail');
	}
	echo '<img src="'.$image.'" alt="'.get_the_title($p_ID).'">';
}

function crop_text($content, $count){
	$content = strip_tags($content);
	$content = substr($content, 0, $count);

	if(strlen($content) >= $count){
		$content = $content.'...';
	}

	return $content;
}

function tel_format($number){
  $number = str_replace(array(' ','-','(',')','+','[',']'),'',$number);
  return $number;
}

function get_social(){
	$links = array(
		'facebook-f'=>'facebook',
		'twitter'=>'twitter',
		'instagram'=>'instagram',
    'linkedin-in'=>'linkedin',
		'youtube'=>'youtube',
		'pinterest'=>'pinterest'
	);
	$html = '<ul class="social">';
	foreach ($links as $key => $link) {
		if($field = get_g_field($link)){
			$html .= '<li><a href="'.$field.'" target="_blank"><i class="fab fa-'.$key.'"></i></a></li>';
		}
	}
	$html .= '</ul>';
	return $html;
}
