<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Goutte\Client;
use Inertia\Inertia;

class ScrapperController extends Controller
{
    public function __construct()
    {
        $this->vr = [];
        $this->pagenb = 1;
    }

    public function scrapper(Request $request)
    {


        $client = new Client();

        $website = $client->request('GET', $request->query('link'));

        $this->getVr($website);

        while ($website->filter('div#error')->count() == 0) {
            $website = $client->request('GET', $request->query('link') . $this->pagenb);
            $this->getVr($website);
            $this->pagenb++;
        }

        $vr = $this->vr;
        // if (empty($vr)) {
        //     // return view('novideo');

        // } else {
        //     // return view('listing', compact('vr'));
        // }
        return Inertia::render('videos', [
            'vr' => $vr
        ]);
    }

    public function getVr($website)
    {
        $videoNode  = $website->filter('div.mb')->each(function ($node) {
            return $node;
        });

        foreach ($videoNode as $key => $value) {
            if ($value->children()->first()->children()->text() == 'VR') {
                $videoVr['title'] = $value->filter('p.mbtit > a')->text();
                if ($value->filter('img')->attr('data-src') == '') {
                    $videoVr['image'] = $value->filter('img')->attr('src');
                } else {
                    $videoVr['image'] = $value->filter('img')->attr('data-src');
                }
                $videoVr['link'] = $value->filter('a')->attr('href');
                $videoVr['duration'] = $value->filter('span.mbtim')->text();
                $videoVr['quality'] = $value->filter('div.mvhdico > span:nth-child(2)')->text();
                $videoVr['html'] = $value->html();

                array_push($this->vr, $videoVr);
            }
        }
    }
}
