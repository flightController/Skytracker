<?php
include_once '../app/lib/WikipediaJsonAdapter.php';


$wikipediaadapter = new \App\lib\WikipediaJsonAdapter();
$test = $wikipediaadapter -> getJsonResponse('Venice|Albert Einstein');
$test = json_decode($test);

var_dump($test);

$pageIds = $test->query->pageids;
$pagenr = $pageIds[0];
$pagenr2 = $pageIds[1];

$pages = $test->query->pages;
$page = $pages->$pagenr;
var_dump($page);
$page2 = $pages-> $pagenr2;

echo $page2 -> extract;