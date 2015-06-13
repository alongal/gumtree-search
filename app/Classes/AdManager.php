<?php namespace App\Classes;

use SimpleHtmlDom;

class AdManager {

    /**
     * Download a website abd turn it to a DOM object
     *
     * @param $url
     * @return bool|simple_html_dom
     */
    function downloadWebsite($url)
    {
        // Create DOM from URL or file
        $html = SimpleHtmlDom\file_get_html($url);

        return $html;
    }

    /**
     * Get the most recent ads in the dom
     *
     * @param $dom
     * @return mixed
     */
    function getMostRecentAdds($dom)
    {
        return $dom->find('ul[id=srchrslt-adtable]', 0);
    }

    /**
     * Download a gumtree website and extract all the adds into an array of adds
     *
     * @param $url
     * @return ads
     */
    function getRecentAdsFromSite($url)
    {
        // Download the website
        $dom = $this->downloadWebsite($url);

        // Get the most recent ads as a dom object
        $domAds = $this->getMostRecentAdds($dom);

        // For each li element in the domAds, create an ad class
        $array = array();
        foreach ($domAds->find('li') as $domAd) {
            $anAd = AdClass::Factory($domAd);
            if ($anAd != null) {
                array_push($array, $anAd);
            }
        }

        return $array;
    }

    function screenKeywordsForAds($ads, $keywords)
    {
        $array = array();
        foreach ($ads as $ad) {
            $ad = AdClassScreener::screenForKeywords($ad, $keywords);
            if ($ad) {
                array_push($array, $ad);
            }
        }

        return $array;
    }


    public function run()
    {
        $ads1 = $this->getRecentAdsFromSite("http://www.gumtree.com.au/s-pets/vic/sheep/k0c18433l3008844?price-type=free");
        $ads1 = $this->screenKeywordsForAds($ads1, []);

        return json_encode($ads1);
    }
} 