<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()
    {
        // Get sample videos for home page slider
        $allVideos = array_merge(
            $this->getYouTubeVideos('@karismatikikatolikiumojawa4252', 'Karismatiki Katoliki'),
            $this->getYouTubeVideos('@ccr_onlinetv9591', 'CCR OnlineTv'),
            $this->getYouTubeVideos('@LORDSGRACEPRAISEWORSHIPTEAM', 'Lord\'s Grace Praise Worship Team')
        );
        
        // Take first 9 videos for slider
        $homeVideos = array_slice($allVideos, 0, 9);
        
        return view('pages.home', [
            'home_videos' => $homeVideos
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function ministries()
    {
        return view('pages.ministries');
    }

    public function events()
    {
        return view('pages.events');
    }

    public function media()
    {
        // Fetch videos from YouTube channels
        $karismatikiVideos = $this->getYouTubeVideos('@karismatikikatolikiumojawa4252', 'Karismatiki Katoliki');
        $ccrVideos = $this->getYouTubeVideos('@ccr_onlinetv9591', 'CCR OnlineTv');
        $lordsGraceVideos = $this->getYouTubeVideos('@LORDSGRACEPRAISEWORSHIPTEAM', 'Lord\'s Grace Praise Worship Team');
        
        return view('pages.media', [
            'karismatiki_videos' => $karismatikiVideos,
            'ccr_videos' => $ccrVideos,
            'lords_grace_videos' => $lordsGraceVideos,
        ]);
    }
    
    /**
     * Get videos from YouTube channel
     */
    private function getYouTubeVideos($channelHandle, $channelName)
    {
        $videos = [];
        
        // Karismatiki Katoliki Umoja wa Vyuo videos
        if ($channelHandle === '@karismatikikatolikiumojawa4252') {
            $videos = [
                [
                    'video_id' => 'aECvmkHM2xk',
                    'title' => 'Worship Session',
                    'description' => 'Powerful worship and praise session from Karismatiki Katoliki'
                ],
                [
                    'video_id' => 'piB8bCCE9Ss',
                    'title' => 'Easter Conference 2025',
                    'description' => 'Easter Conference 2025 - Day 1'
                ],
                [
                    'video_id' => 'gcuEPea5sCs',
                    'title' => 'Easter Conference 2025',
                    'description' => 'Easter Conference 2025 - Day 2'
                ],
                [
                    'video_id' => 'PHxHTYu8Ow8',
                    'title' => 'Usiku wa Sifa',
                    'description' => 'Night of Praise - Worship and Prayer Session'
                ],
                [
                    'video_id' => 'P8E_GW2nY9g',
                    'title' => 'Usiku wa Sifa',
                    'description' => 'Night of Praise - Worship Session'
                ],
                [
                    'video_id' => 'kO9LH4gik-M',
                    'title' => 'Usiku wa Sifa',
                    'description' => 'Night of Praise - Prayer and Worship'
                ],
                [
                    'video_id' => 'IHn_YFij38M',
                    'title' => 'Karismatiki Katoliki - Worship',
                    'description' => 'Powerful worship session from Karismatiki Katoliki Umoja wa Vyuo'
                ],
                [
                    'video_id' => 'GAqveuokUlc',
                    'title' => 'Karismatiki Katoliki - Ministry',
                    'description' => 'Ministry and teaching session from Karismatiki Katoliki'
                ],
                [
                    'video_id' => '4DWAD7U95X0',
                    'title' => 'Karismatiki Katoliki - Fellowship',
                    'description' => 'Fellowship and worship gathering'
                ],
                [
                    'video_id' => '8CX7FbJeCpU',
                    'title' => 'Karismatiki Katoliki - Event',
                    'description' => 'Event recording from Karismatiki Katoliki Umoja wa Vyuo'
                ],
            ];
        }
        
        // CCR OnlineTv videos
        if ($channelHandle === '@ccr_onlinetv9591') {
            $videos = [
                [
                    'video_id' => 'JY0n9sk9SRg',
                    'title' => 'CCR OnlineTv - Praise and Worship',
                    'description' => 'Anointed praise and worship session'
                ],
                [
                    'video_id' => 'HxTL17tQLds',
                    'title' => 'CCR OnlineTv - Ministry Session',
                    'description' => 'Ministry and teaching session from CCR OnlineTv'
                ],
                [
                    'video_id' => 'oXJ94ngqGqA',
                    'title' => 'CCR OnlineTv - Spiritual Content',
                    'description' => 'Spiritual content and ministry from CCR OnlineTv'
                ],
            ];
        }
        
        // Lord's Grace Praise Worship Team videos
        if ($channelHandle === '@LORDSGRACEPRAISEWORSHIPTEAM') {
            $videos = [
                [
                    'video_id' => 'szGy_XaLbFw',
                    'title' => 'Praise and Worship',
                    'description' => 'Powerful praise and worship session by Lord\'s Grace Praise Worship Team'
                ],
                [
                    'video_id' => 'TOd2fC_6EWY',
                    'title' => 'Worship Session',
                    'description' => 'Anointed worship session led by Lord\'s Grace Praise Worship Team'
                ],
                [
                    'video_id' => 'DJi3nzO5cFM',
                    'title' => 'Praise Team Performance',
                    'description' => 'Inspiring praise and worship performance'
                ],
                [
                    'video_id' => 's-U8mJMScxQ',
                    'title' => 'Worship and Praise',
                    'description' => 'Beautiful worship and praise session'
                ],
                [
                    'video_id' => 'r6Di764gHQ4',
                    'title' => 'Praise Team Ministry',
                    'description' => 'Ministry through music and worship by Lord\'s Grace Praise Worship Team'
                ],
            ];
        }
        
        return $videos;
    }

    public function resources()
    {
        return view('pages.resources');
    }

    public function getInvolved()
    {
        return view('pages.get-involved');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function terms()
    {
        return view('pages.legal.terms');
    }

    public function privacy()
    {
        return view('pages.legal.privacy');
    }

    public function codeOfConduct()
    {
        return view('pages.legal.code-of-conduct');
    }
}

