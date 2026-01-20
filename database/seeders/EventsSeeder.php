<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class EventsSeeder extends Seeder
{
    public function run(): void
    {
        // International Easter Conference 2026
        Event::create([
            'title' => 'International Easter Conference 2026',
            'title_sw' => 'Kongamano la Kimataifa la Pasaka 2026',
            'slug' => 'international-easter-conference-2026',
            'description' => 'Join us for the International Easter Conference 2026 in Mbeya. A transformative gathering that will renew your mind, knowledge, economy, perspective, relationships, family, and give you the courage of conviction that has served as a bridge for many people.',
            'description_sw' => 'Usifanye *MISTAKE KABISA kukosa Kongamano hili toka nimeuzulia, nakuwa mpya kifikra, kiujuzi, kiuchumi, mtazamo na kimahusiano, kifamilia na natiwa ujasiri wa uthubutu limetumika kuwa daraja kwaajili ya watu wengi*',
            'content' => 'The International Easter Conference 2026 is a powerful gathering that will transform your life. Don\'t make the mistake of missing this conference. It will make you new in thinking, knowledge, economy, perspective, relationships, family, and give you the courage of conviction that has served as a bridge for many people.',
            'content_sw' => 'Mambo ni mazuri International Easter Conference 2026 twende kwa pamoja',
            'full_details' => 'Join us for the International Easter Conference 2026 in Mbeya City on February 15, 2026. This conference will be a transformative experience that renews your mind, expands your knowledge, improves your economic perspective, enhances relationships, strengthens family bonds, and gives you the courage of conviction that has served as a bridge for many people.',
            'full_details_sw' => 'Wapendwa, familia ya Mungu, Tunawakaribisha sana kwenye Physical Fundraising kuwezesha Kongamano la Kimataifa la Pasaka 2026 (International Easter Conference 2026) itakayofanyika JIJINI MBEYA tarehe 15 FEBRUARY 2026. Karibu sana. Tuma huu ujumbe mara nyingi iwezekanavyo. Alika watu wote🔥🔥🔥🔥🔥',
            'banner_image' => asset('images/11.jpg'),
            'start_date' => '2026-02-15 08:00:00',
            'end_date' => '2026-02-18 18:00:00',
            'location' => 'Mbeya City, Tanzania',
            'status' => 'upcoming',
            'is_featured' => true,
            'order' => 1,
            'payment_info' => 'Payment Information for International Easter Conference 2026:

1. Vodacom Phone Number: 0792 573 433 - CCR UMOJA WA VYUO TZ
2. Lipa Namba (Vodacom): 58286111 - CCR UMOJA WA VYUO TZ
3. Bank Account - CRDB Bank: 0150027996201 - Catholic Charismatic Renewal',
            'payment_info_sw' => 'NAMBA ZA MALIPO UMOJA WA VYUO TANZANIA:

1. Namba za Simu VODA: 0792 573 433 - CCR UMOJA WA VYUO TZ
2. Lipa Namba VODA: 58286111 - CCR UMOJA WA VYUO TZ
3. Account ya Bank CRDB Bank A/c: 0150027996201 - Catholic Charismatic Renewal',
            'prayer_meeting_link' => 'https://meet.google.com/jea-zvpr-ctn',
            'prayer_meeting_code' => 'jea-zvpr-ctn',
            'prayer_schedule' => 'Prayer and Intercession Service for International Easter Conference 2026

Prayer Days: Wednesday and Thursday
Time: 2:00 AM - 3:00 AM (Night)

Join us for special prayers and intercession for the International Easter Conference 2026.',
            'prayer_schedule_sw' => 'HUDUMA YA MAOMBI NA MAOMBEZI INAKUALIKA KATIKA MAOMBI MAALUMU KWA AJILI YA INTERNATIONAL EASTER CONFERENCE

SIKU ZA MAOMBI: J4 NA ALHAMIS
MUDA: SAA 02-03 USIKU

Tumsifu Yesu Kristo',
            'registration_info' => 'Registration for the International Easter Conference 2026 is now open. Please make your payment using the provided payment methods and contact us for registration confirmation.',
            'registration_info_sw' => 'Usajili wa Kongamano la Kimataifa la Pasaka 2026 umefunguliwa. Tafadhali fanya malipo yako kwa kutumia njia za malipo zilizotolewa na wasiliana nasi kwa uthibitisho wa usajili.',
            'contact_phone' => '0792 573 433',
            'contact_email' => 'info@iccr.or.tz',
            'schedule' => 'Lent Schedule 2026:

• Ash Wednesday: February 18, 2026
• First Sunday of Lent: February 22, 2026
• Second Sunday of Lent: March 1, 2026
• Third Sunday of Lent: March 8, 2026
• Fourth Sunday of Lent (Laetare): March 15, 2026
• Fifth Sunday of Lent: March 22, 2026
• Palm Sunday: March 29, 2026
• Holy Thursday: April 2, 2026
• Good Friday: April 3, 2026
• Holy Saturday (Easter Vigil): April 4, 2026
• Easter Sunday: April 5, 2026

Praise Jesus Christ',
            'schedule_sw' => 'RATIBA YA KWARESMA 2026:

• Jumatano ya Majivu: Februari 18, 2026
• Dominika ya Kwanza ya Kwaresma: Februari 22, 2026
• Dominika ya Pili ya Kwaresma: Machi 1, 2026
• Dominika ya Tatu ya Kwaresma: Machi 8, 2026
• Dominika ya Nne ya Kwaresma (Laetare): Machi 15, 2026
• Dominika ya Tano ya Kwaresma: Machi 22, 2026
• Dominika ya Matawi: Machi 29, 2026
• Alhamisi Kuu: Aprili 2, 2026
• Ijumaa Kuu: Aprili 3, 2026
• Jumamosi Kuu (Mkesha wa Pasaka): Aprili 4, 2026
• Jumapili ya Pasaka: Aprili 5, 2026

TUMSIFU YESU KRISTO WAPENDWA🙏',
        ]);

        // Night of Praise Event
        Event::create([
            'title' => 'Night of Praise',
            'title_sw' => 'Usiku wa Sifa',
            'slug' => 'night-of-praise-2026',
            'description' => 'Join us for an evening of powerful worship, prayer, and fellowship. This event brings together students from across Tanzania for a night of praise and spiritual renewal.',
            'description_sw' => 'Karibu kwenye usiku wa sifa, maombi, na ushirika. Tukio hili linaleta pamoja wanafunzi kutoka Tanzania nzima kwa usiku wa sifa na ufufuo wa kiroho.',
            'content' => 'Experience an evening of powerful worship, prayer, and fellowship. This event brings together students from across Tanzania for a night of praise and spiritual renewal.',
            'content_sw' => 'Jipatie uzoefu wa usiku wa sifa, maombi, na ushirika. Tukio hili linaleta pamoja wanafunzi kutoka Tanzania nzima.',
            'banner_image' => asset('images/03.jpg'),
            'start_date' => '2026-01-25 18:00:00',
            'end_date' => '2026-01-25 22:00:00',
            'location' => 'Dar es Salaam',
            'status' => 'upcoming',
            'is_featured' => false,
            'order' => 2,
        ]);

        // Regional Spiritual Camp
        Event::create([
            'title' => 'Regional Spiritual Camp',
            'title_sw' => 'Kambi ya Kiroho ya Mkoa',
            'slug' => 'regional-spiritual-camp-2026',
            'description' => 'A weekend retreat focused on spiritual growth, fellowship, and community building for students in the region.',
            'description_sw' => 'Mkusanyiko wa wikendi unaolenga ukuaji wa kiroho, ushirika, na ujenzi wa jamii kwa wanafunzi wa mkoa.',
            'content' => 'Join us for a weekend retreat focused on spiritual growth, fellowship, and community building. This camp provides an opportunity for students to deepen their faith and build lasting friendships.',
            'content_sw' => 'Karibu kwenye mkusanyiko wa wikendi unaolenga ukuaji wa kiroho, ushirika, na ujenzi wa jamii.',
            'banner_image' => asset('images/04.jpg'),
            'start_date' => '2026-03-10 08:00:00',
            'end_date' => '2026-03-12 18:00:00',
            'location' => 'Arusha',
            'status' => 'upcoming',
            'is_featured' => false,
            'order' => 3,
        ]);

        // Leadership Training Workshop
        Event::create([
            'title' => 'Leadership Training Workshop',
            'title_sw' => 'Warsha ya Mafunzo ya Uongozi',
            'slug' => 'leadership-training-workshop-2026',
            'description' => 'A comprehensive training program designed to develop leadership skills among student leaders and chapter coordinators.',
            'description_sw' => 'Programu kamili ya mafunzo iliyoundwa kuendeleza ujuzi wa uongozi miongoni mwa viongozi wa wanafunzi na wasimamizi wa sura.',
            'content' => 'This comprehensive training program is designed to develop leadership skills among student leaders and chapter coordinators. Learn practical leadership principles and strategies for effective ministry.',
            'content_sw' => 'Programu hii kamili ya mafunzo imeundwa kuendeleza ujuzi wa uongozi miongoni mwa viongozi wa wanafunzi.',
            'banner_image' => asset('images/05.jpg'),
            'start_date' => '2026-04-20 09:00:00',
            'end_date' => '2026-04-22 17:00:00',
            'location' => 'Dodoma',
            'status' => 'upcoming',
            'is_featured' => false,
            'order' => 4,
        ]);
    }
}
