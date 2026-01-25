<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaders = [
            [
                'name' => 'Dr. Emmanuel Lulandala',
                'title' => 'National Chairman',
                'role' => 'National Leadership',
                'bio' => 'Leading our national vision and mission with dedication and spiritual guidance. Dr. Lulandala brings years of experience in ministry and leadership.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/emmanuel-lulandala.jpg',
                'email' => 'chairman@icccr.or.tz',
                'phone' => '+255 123 456 789',
                'social_links' => [
                    'facebook' => 'https://facebook.com/emmanuel.lulandala',
                    'twitter' => 'https://twitter.com/elulandala',
                ],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Secretary General',
                'title' => 'Secretary General',
                'role' => 'Administrative Leadership',
                'bio' => 'Managing our day-to-day operations and ensuring smooth coordination across all chapters and regions. Dedicated to serving the community with excellence.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/secretary-general.jpg',
                'email' => 'secretary@icccr.or.tz',
                'phone' => '+255 123 456 790',
                'social_links' => [
                    'facebook' => 'https://facebook.com/iccr.secretary',
                ],
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Treasurer',
                'title' => 'Treasurer',
                'role' => 'Financial Management',
                'bio' => 'Overseeing our financial resources with integrity and transparency. Ensuring proper stewardship of funds for ministry and community projects.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/treasurer.jpg',
                'email' => 'treasurer@icccr.or.tz',
                'phone' => '+255 123 456 791',
                'social_links' => [],
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Prayer Leader',
                'title' => 'Prayer Leader',
                'role' => 'Spiritual Guidance',
                'bio' => 'Leading our prayer and worship, fostering deeper connection with God. Guiding the community in spiritual growth and intercessory prayer.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/prayer-leader.jpg',
                'email' => 'prayer@icccr.or.tz',
                'phone' => '+255 123 456 792',
                'social_links' => [
                    'facebook' => 'https://facebook.com/iccr.prayer',
                ],
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Evangelism Coordinator',
                'title' => 'Evangelism Coordinator',
                'role' => 'Outreach & Evangelism',
                'bio' => 'Coordinating evangelistic efforts and outreach programs across campuses. Passionate about sharing the Gospel and reaching students for Christ.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/evangelism-coordinator.jpg',
                'email' => 'evangelism@icccr.or.tz',
                'phone' => '+255 123 456 793',
                'social_links' => [
                    'facebook' => 'https://facebook.com/iccr.evangelism',
                    'instagram' => 'https://instagram.com/iccr.evangelism',
                ],
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Youth Coordinator',
                'title' => 'Youth Coordinator',
                'role' => 'Youth Ministry',
                'bio' => 'Empowering and equipping young people for ministry and leadership. Creating opportunities for youth to grow in faith and serve their communities.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/youth-coordinator.jpg',
                'email' => 'youth@icccr.or.tz',
                'phone' => '+255 123 456 794',
                'social_links' => [
                    'facebook' => 'https://facebook.com/iccr.youth',
                    'instagram' => 'https://instagram.com/iccr.youth',
                ],
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Media & Communications Director',
                'title' => 'Media Director',
                'role' => 'Communications',
                'bio' => 'Managing our media presence and communications strategy. Ensuring effective communication with members and the broader community through various channels.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/media-director.jpg',
                'email' => 'media@icccr.or.tz',
                'phone' => '+255 123 456 795',
                'social_links' => [
                    'facebook' => 'https://facebook.com/iccr.tanzania',
                    'twitter' => 'https://twitter.com/iccr_tanzania',
                    'instagram' => 'https://instagram.com/iccr_tanzania',
                ],
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Regional Coordinator - Dar es Salaam',
                'title' => 'Regional Coordinator',
                'role' => 'Regional Leadership',
                'bio' => 'Coordinating activities and chapters in the Dar es Salaam region. Supporting local chapters and facilitating regional events and gatherings.',
                'photo' => 'https://res.cloudinary.com/dpyppzvzj/image/upload/v1706000000/iccr/leaders/regional-coordinator-dar.jpg',
                'email' => 'dar@icccr.or.tz',
                'phone' => '+255 123 456 796',
                'social_links' => [],
                'order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($leaders as $leader) {
            TeamMember::create($leader);
        }
    }
}


