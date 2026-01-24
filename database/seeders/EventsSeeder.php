<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'title' => 'Night of Praise',
                'slug' => 'night-of-praise',
                'description' => 'Join us for an evening of powerful worship, prayer, and fellowship. This event brings together students from across Tanzania for a night of praise and spiritual renewal.',
                'content' => '<p>Experience an unforgettable night of worship and praise as we gather together in unity. This event features powerful worship sessions, inspiring testimonies, and an atmosphere charged with the presence of the Holy Spirit.</p><p>All students are welcome to join us for this transformative evening of spiritual renewal and fellowship.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/night-of-praise.jpg',
                'start_date' => Carbon::now()->addDays(15),
                'end_date' => Carbon::now()->addDays(15)->setTime(23, 0),
                'location' => 'Dar es Salaam',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Regional Spiritual Camp',
                'slug' => 'regional-spiritual-camp',
                'description' => 'A multi-day spiritual camp focused on deepening your relationship with God through prayer, teaching, and fellowship. Open to all students from regional colleges.',
                'content' => '<p>A transformative 3-day camp in Dodoma focusing on spiritual growth, prayer, and community building. Students will experience deep worship, powerful teachings, and meaningful fellowship.</p><p>This camp is designed to help you grow in your faith and build lasting relationships with fellow believers.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/spiritual-camp.jpg',
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(32),
                'location' => 'Dodoma',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Saturday Prayer Retreat',
                'slug' => 'saturday-prayer-retreat',
                'description' => 'A day-long prayer retreat focused on reflection, meditation, and spiritual growth. Perfect for those seeking a deeper connection with God.',
                'content' => '<p>Join us for a day of focused prayer, meditation, and spiritual reflection. This retreat provides a peaceful environment for you to connect with God and grow in your faith.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/prayer-retreat.jpg',
                'start_date' => Carbon::now()->addDays(45),
                'end_date' => Carbon::now()->addDays(45)->setTime(17, 0),
                'location' => 'Mwanza',
                'status' => 'upcoming',
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'title' => 'Open Gate Camp - Moshi & Arusha',
                'slug' => 'open-gate-camp-moshi-arusha',
                'description' => 'A transformative multi-day camp bringing together students from Moshi and Arusha regions. Experience powerful worship, inspiring teachings, and life-changing encounters with the Holy Spirit.',
                'content' => '<p>This camp focuses on opening gates of breakthrough, healing, and spiritual renewal. Join hundreds of students from the northern regions for this powerful gathering.</p><p>Expected attendance: 500+ students</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/open-gate-camp.jpg',
                'start_date' => Carbon::now()->addDays(60),
                'end_date' => Carbon::now()->addDays(62),
                'location' => 'Moshi & Arusha',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'title' => 'Perfect Vision - Mbeya',
                'slug' => 'perfect-vision-mbeya',
                'description' => 'A powerful conference focused on gaining clarity in your spiritual journey and life purpose. Through dynamic worship, prophetic ministry, and practical teaching, discover God\'s perfect vision for your life.',
                'content' => '<p>This conference is designed to help you see clearly and walk confidently in your calling. Through dynamic worship, prophetic ministry, and practical teaching, you will discover God\'s perfect vision for your life.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/perfect-vision.jpg',
                'start_date' => Carbon::now()->addDays(75),
                'end_date' => Carbon::now()->addDays(75)->setTime(18, 0),
                'location' => 'Mbeya',
                'status' => 'upcoming',
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'title' => 'Usiku wa Sifa - Dar es Salaam',
                'slug' => 'usiku-wa-sifa-dar-es-salaam',
                'description' => 'Experience an unforgettable night of praise and worship in Dar es Salaam. Join hundreds of students as we lift our voices in unity, declaring God\'s goodness and faithfulness.',
                'content' => '<p>This powerful worship night features anointed music, prophetic declarations, and an atmosphere charged with the presence of the Holy Spirit. Live music and powerful worship await you.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/usiku-wa-sifa.jpg',
                'start_date' => Carbon::now()->addDays(90),
                'end_date' => Carbon::now()->addDays(90)->setTime(23, 0),
                'location' => 'Dar es Salaam',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 6,
            ],
            [
                'title' => 'NexGen Camp, Retreat & Leadership School',
                'slug' => 'nexgen-camp-leadership-school',
                'description' => 'A comprehensive leadership development program designed for the next generation of leaders. This intensive camp combines spiritual formation, practical leadership training, and strategic planning.',
                'content' => '<p>Perfect for current and aspiring chapter leaders, ministry coordinators, and those called to serve in leadership roles. This 5-day program includes certificate completion.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/nexgen-leadership.jpg',
                'start_date' => Carbon::now()->addDays(120),
                'end_date' => Carbon::now()->addDays(124),
                'location' => 'Dar es Salaam',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 7,
            ],
            [
                'title' => 'Easter Conference 2025',
                'slug' => 'easter-conference-2025',
                'description' => 'A powerful 3-day conference celebrating the resurrection of Christ with worship, teaching, and fellowship. Over 800 students gathered from across Tanzania.',
                'content' => '<p>This annual conference brings together students from all regions for a powerful celebration of the resurrection. Experience powerful worship, inspiring teachings, and meaningful fellowship.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/easter-conference.jpg',
                'start_date' => Carbon::now()->subDays(60),
                'end_date' => Carbon::now()->subDays(58),
                'location' => 'Dar es Salaam',
                'status' => 'past',
                'is_featured' => false,
                'order' => 8,
            ],
            [
                'title' => 'Leadership Development Workshop',
                'slug' => 'leadership-development-workshop',
                'description' => 'A comprehensive 5-day leadership training program for chapter leaders. Participants learned practical skills in ministry leadership, event planning, and discipleship.',
                'content' => '<p>This workshop equipped 120 leaders with practical skills for effective ministry leadership. Topics included event planning, discipleship, and strategic ministry development.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leadership-workshop.jpg',
                'start_date' => Carbon::now()->subDays(90),
                'end_date' => Carbon::now()->subDays(86),
                'location' => 'Dar es Salaam',
                'status' => 'past',
                'is_featured' => false,
                'order' => 9,
            ],
            [
                'title' => 'Campus Fellowship Night',
                'slug' => 'campus-fellowship-night',
                'description' => 'A vibrant evening of fellowship, games, and testimonies. Students from multiple campuses came together to build relationships and share their faith journeys.',
                'content' => '<p>This fellowship night brought together 250+ students from multiple campuses for an evening of fun, fellowship, and testimonies. A great opportunity to build relationships and share faith journeys.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/fellowship-night.jpg',
                'start_date' => Carbon::now()->subDays(120),
                'end_date' => Carbon::now()->subDays(120)->setTime(22, 0),
                'location' => 'Mwanza',
                'status' => 'past',
                'is_featured' => false,
                'order' => 10,
            ],
            [
                'title' => 'Bible Study & Discipleship Conference',
                'slug' => 'bible-study-discipleship-conference',
                'description' => 'A 2-day conference focused on deepening biblical knowledge and discipleship skills. Featured workshops on Bible study methods, small group leadership, and spiritual mentoring.',
                'content' => '<p>This conference equipped 400+ participants with practical tools for Bible study and discipleship. Workshops covered Bible study methods, small group leadership, and spiritual mentoring.</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/bible-study-conference.jpg',
                'start_date' => Carbon::now()->subDays(150),
                'end_date' => Carbon::now()->subDays(149),
                'location' => 'Mbeya',
                'status' => 'past',
                'is_featured' => false,
                'order' => 11,
            ],
            [
                'title' => 'International Easter Conference 2026',
                'slug' => 'international-easter-conference-2026',
                'description' => 'USIFANYE MISTAKE KABISA KUKOSA KONGAMANO HILI! Join us for this life-transforming conference that will renew your mind, skills, finances, relationships, and family life.',
                'content' => '<p>Toka nimeuzulia, nakuwa mpya kifikra, kiujuzi, kiuchumi, mtazamo na kimahusiano, kifamilia na natiwa ujasiri wa uthubutu limetumika kuwa daraja kwa ajili ya watu wengi. MAMBO NI MAZURI - TWENDE KWA PAMOJA!</p>',
                'banner_image' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/easter-conference-2026.jpg',
                'start_date' => Carbon::now()->addDays(100),
                'end_date' => Carbon::now()->addDays(102),
                'location' => 'Dar es Salaam',
                'status' => 'upcoming',
                'is_featured' => true,
                'order' => 12,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
