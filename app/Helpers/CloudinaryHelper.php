<?php

if (!function_exists('cloudinary_url')) {
    /**
     * Generate Cloudinary URL with transformations
     */
    function cloudinary_url($publicId, $transformation = 'thumbnail')
    {
        $cloudName = 'dpyppzvzj';
        $baseUrl = "https://res.cloudinary.com/{$cloudName}/image/upload";
        
        // Map local filenames to Cloudinary public IDs
        $imageMap = [
            'logo.png' => 'v1769248781/03_bcnodq',
            '01.jpg' => 'v1769248781/03_bcnodq',
            '02.jpg' => 'v1769248781/02_ktgnj1',
            '03.jpg' => 'v1769248781/03_bcnodq',
            '04.jpg' => 'v1769248784/04_zaxbya',
            '05.jpg' => 'v1769248782/05_rzjpac',
            '06.jpg' => 'v1769248781/06_pjvhpm',
            '07.jpg' => 'v1769248783/08_hkg76y',
            '08.jpg' => 'v1769248783/08_hkg76y',
            '09.jpg' => 'v1769248783/09_tmuarx',
            '10.jpg' => 'v1769248784/10_nkfum5',
            '11.jpg' => 'v1769248788/11_siu1wx',
            'hero-media.jpg' => 'v1769248784/10_nkfum5',
            'hero-faq.jpg' => 'v1769248788/11_siu1wx',
            'hero-resources.jpg' => 'v1769248783/09_tmuarx',
            'gallery-event1.jpg' => 'v1769248784/10_nkfum5',
            'gallery-event2.jpg' => 'v1769248788/11_siu1wx',
            'gallery-ministry1.jpg' => 'v1769248784/04_zaxbya',
            'gallery-ministry2.jpg' => 'v1769248782/05_rzjpac',
            'gallery-campus1.jpg' => 'v1769248781/06_pjvhpm',
            'gallery-campus2.jpg' => 'v1769248781/03_bcnodq',
            'gallery-worship1.jpg' => 'v1769248783/08_hkg76y',
            'gallery-worship2.jpg' => 'v1769248783/09_tmuarx',
            'video-thumb1.jpg' => 'v1769248784/10_nkfum5',
            'video-thumb2.jpg' => 'v1769248788/11_siu1wx',
            'video-thumb3.jpg' => 'v1769248784/04_zaxbya',
            'og-default.jpg' => 'v1769248781/02_ktgnj1'
        ];
        
        $transformations = [
            'hero' => 'w_1920,h_1080,c_fill,g_auto,q_auto:best,f_auto',
            'thumbnail' => 'w_400,h_300,c_fill,g_auto,q_auto:good,f_auto',
            'card' => 'w_600,h_400,c_fill,g_auto,q_auto:good,f_auto',
            'gallery' => 'w_800,h_600,c_fill,g_auto,q_auto:good,f_auto',
            'logo' => 'w_200,h_200,c_scale,q_auto:best,f_auto',
            'banner' => 'w_1200,h_400,c_fill,g_auto,q_auto:good,f_auto',
            'square' => 'w_300,h_300,c_fill,g_auto,q_auto:good,f_auto',
            'portrait' => 'w_400,h_600,c_fill,g_auto,q_auto:good,f_auto',
            'landscape' => 'w_800,h_450,c_fill,g_auto,q_auto:good,f_auto'
        ];
        
        $publicId = $imageMap[$publicId] ?? $publicId;
        $transform = $transformations[$transformation] ?? $transformations['thumbnail'];
        
        return "{$baseUrl}/{$transform}/{$publicId}.jpg";
    }
}

if (!function_exists('cloudinary_image')) {
    /**
     * Generate Cloudinary image tag with transformations
     */
    function cloudinary_image($publicId, $alt = '', $transformation = 'thumbnail', $class = '', $loading = 'lazy')
    {
        $url = cloudinary_url($publicId, $transformation);
        $loadingAttr = $loading ? "loading=\"{$loading}\"" : '';
        
        return "<img src=\"{$url}\" alt=\"{$alt}\" class=\"{$class}\" {$loadingAttr}>";
    }
}
