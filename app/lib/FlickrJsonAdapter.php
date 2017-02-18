<?php

namespace App\lib;

class FlickrJsonAdapter
{
    private $apiKey;
    private static $baseUrl = 'https://www.flickr.com/services/rest/?';
    private $method = '&method=flickr.photos.search';
    private $responseType = '&format=json';
    private $tags = '&tags=';
    private $content_type = '&content_type=1';
    private $per_page = '&per_page=';
    private $tag_mode = 'tag_mode=all';

    /**
     * FlickrJsonAdapter constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }


    private function getPictures(string $searchString, string $howMany, string $size, string $format)
    {
        $searchString = preg_replace ( '/[^a-z0-9 ]/i', '', $searchString );
        $photoUrls = array();
        $url = (self::$baseUrl . $this->method . $this->tags . rawurlencode($searchString) . $this->responseType . $this->content_type . $this->per_page . $howMany . '&api_key=' . $this->apiKey . '&nojsoncallback=1' . $this->tag_mode);
        $response = json_decode(file_get_contents($url));
        if($response == null){
            $photoUrls[] = "";
            return $photoUrls;
        }

        if(!isset($response->photos->photo)){
            return[];
        }
        $responsePhotos= $response->photos->photo;

        foreach ($responsePhotos as $photo) {
            $farmId = $photo->farm;
            $serverId = $photo->server;
            $photoId = $photo->id;
            $secretId = $photo->secret;

            $photoUrl = 'http://farm' . $farmId . '.staticflickr.com/' . $serverId . '/' . $photoId . '_' . $secretId . $size . '.' . $format;
            $photoUrls[] = $photoUrl;

        }
        return $photoUrls;
    }

    public function getSmallPictures(string $city, string $howMany) {
        return $this->getPictures($city, $howMany, '_m', 'jpg');
    }

    public function getFullPictures(string $city, string $howMany) {
        return $this->getPictures($city, $howMany, '', 'jpg');
    }
}