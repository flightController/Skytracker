<?php

namespace App\lib;

class WikipediaJsonAdapterV2
{
    public function get($what)
    {
        $url = 'http://de.wikipedia.org/w/api.php';
        $url .= '?action=query&format=json&prop=extracts&indexpageids=1&continue=%7C%7C&titles=';
        $url .= urlencode($what);
        $url .= '&redirects=1&exchars=1000&exlimit=max&exintro=1&explaintext=1';

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


    public function getCityDescription($cityName): string
    {
        $wikiInformation = $this->get($cityName);
        $wikiInformation = json_decode($wikiInformation);
        if (!isset($wikiInformation->query->pages)) {
            return "";
        }

        $pages = $wikiInformation->query->pages;

        $objectVars = get_object_vars($pages);
        $text = "";
        foreach ($objectVars as $key => $value) {
            $page = $pages->$key;
            if ((($page->title) == $cityName)&&((strlen($page->extract)) > 250)){
                return $page->extract;
            }
            $text .= $page->extract;
            if(strlen($text)>600){
                return $text;
            }
        }
        return $text;
    }

    public function getShortCityDescription($cityName): string
    {
        $text = $this->getCityDescription($cityName);
        return (substr($text, 0, 550) . '...');
    }
}