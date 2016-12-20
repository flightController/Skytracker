<?php

namespace App\lib;

class WikipediaJsonAdapter
{
    private function get($what)
    {
        $url = 'http://de.wikipedia.org/w/api.php';
        $url .= '?action=query&format=json&prop=extracts&generator=search';
        $url .= '&utf8=1&exsentences=5&exlimit=max&exintro=1&explaintext=1';
        $url .= '&gsrnamespace=0&gsrlimit=10&gsrsearch=' . urlencode($what);

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
        if (!isset($wikiInformation)) {
            return "";
        }

        $pages = $wikiInformation->query->pages;

        $objectvars = get_object_vars($pages);
        $text = "";
        foreach ($objectvars as $key => $value) {
            $page = $pages->$key;
            if (($page->title) == $cityName) {
                return $page->extract;
            }
            $text .= $page->extract;
        }
        return $text;
    }

    public function getCityDescriptions(array $cityNames): array
    {
        $searchString = "";
        foreach ($cityNames as $cityName) {
            $searchString .= $cityName . "|";
        }

        $wikiInformation = $this->get($cityName);
        $wikiInformation = json_decode($wikiInformation);
        if (!isset($wikiInformation)) {
            return "";
        }

        $pages = $wikiInformation->query->pages;

        $objectvars = get_object_vars($pages);
        $cityDescriptions = array();

        foreach ($cityNames as $cityName) {
            foreach ($objectvars as $key => $value) {
                $page = $pages->$key;
                if (($page->title) == $cityName) {
                    $cityDescriptions[$cityName] = $page->extract;
                }
            }
        }

        return $cityDescriptions;
    }

    public function getShortCityDescriptions(array $cityNames)
    {
        $cityDescriptions = $this->getCityDescriptions($cityNames);
        foreach ($cityDescriptions as $city => $cityDescription) {
            $cityDescription = (substr($cityDescription, 0, 550) . '...');
        }
        return $cityDescriptions;
    }

    public function getShortCityDescription($cityName): string
    {
        $text = $this->getCityDescription($cityName);
        return (substr($text, 0, 550) . '...');
    }
}