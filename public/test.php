<?php
include_once '../app/lib/WikipediaJsonAdapterV2.php';


$wikipediaadapter = new \App\lib\WikipediaJsonAdapterV2();
$test = $wikipediaadapter -> get('Venice|Albert Einstein');
$test = json_decode($test);

$pageIds = $test->query->pageids;
$pagenr = $pageIds[0];
$pagenr2 = $pageIds[1];

$pages = $test->query->pages;
$page = $pages->$pagenr;
$page2 = $pages-> $pagenr2;

echo $page2 -> extract;