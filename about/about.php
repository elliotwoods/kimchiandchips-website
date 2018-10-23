<?php

include(dirname(__DIR__).'/main.php');

function render_about_begin() {
	render_snippet('html_begin');
	render_snippet('head');
	render_snippet('body_begin');
	render_snippet('top_button');
	render_snippet('navigation_bar');
}

function render_about_end() {
	render_snippet('footer');
	render_snippet('body_end');
	render_snippet('html_end');
}

$doc_path = realpath(getcwd());
$works_path = realpath(__DIR__);
$work_url_path = '/about/' . str_replace($about_path . DIRECTORY_SEPARATOR, '', $doc_path) . '/';

?>