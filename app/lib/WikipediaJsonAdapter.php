<?php

namespace App\lib;

class WikipediaJsonAdapter
{
    public function getJsonResponse($what)
    {
        $url = 'http://de.wikipedia.org/w/api.php';
        $url .= '?action=query&format=json&prop=extracts&indexpageids=1&continue=%7C%7C&titles=';
        $url .= urlencode($what);
        $url .= '&redirects=1&exchars=600&exlimit=max&exintro=1&explaintext=1';

        $options = array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'], // name of client
            CURLOPT_SSL_VERIFYPEER => false,

        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        if ($response === false) {
            return "";
        }
        curl_close($ch);
        return $response;
    }

    public function getDescriptions(array $searchTerms) : array
    {
        $preparedSearchTerms = $this->prepareStrings($searchTerms);
        $searchString = implode('|', $preparedSearchTerms);
        $jsonResponse = $this->getJsonResponse($searchString);
        $response = json_decode($jsonResponse);

        $pageIds = $response->query->pageids;
        $pages = $response->query->pages;
        if(empty($pages)){
            return [];
        }
        foreach ($searchTerms as $searchTerm){
            $descriptions[$searchTerm] = "Für diese Destination wurde leider keine geeignete Beschreibung gefunden.";
        }

        foreach ($pageIds as $pageId){
            $page = $pages->$pageId;
            $title = $page->title;
            if(empty($page->extract)){
                continue;
            }
            $description =  $page->extract;
            for($i = 0; $i < count($preparedSearchTerms); $i++){
                if($preparedSearchTerms[$i] == $title){
                    $descriptions[$searchTerms[$i]] = $description;
                }
            }
        }
        return $descriptions;
    }

    public function prepareStrings(array $strings){
        foreach ($strings as $string){
            $string = preg_replace('/\/.*$/', '',$string);
            $string = preg_replace('/\(.*$/', '',$string);
            $string = preg_replace('/\,.*$/', '',$string);
            $string = preg_replace('/\.*$/', '',$string);
           $preparedStrings[] = $string;
        }
        return $preparedStrings;
    }
}