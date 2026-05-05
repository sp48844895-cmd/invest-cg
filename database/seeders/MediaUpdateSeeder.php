<?php

namespace Database\Seeders;

use App\Models\MediaUpdate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MediaUpdateSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => '6 investment proposals bagged after CM’s trip to Japan & South Korea',
                'summary' => 'Chhattisgarh CM Vishnu Deo Sai concluded an eight-day trip attracting major foreign investments from Japan and South Korea.',
                'source_url' => 'https://timesofindia.indiatimes.com/city/raipur/6-investment-proposals-for-state-bagged-after-cms-trip-to-japan-s-korea/articleshow/123607277.cms',
                'image_url' => 'https://static.toiimg.com/thumb/msid-123607276,imgsize-43232,width-400,height-225,resizemode-72/6-investment-proposals-for-state-bagged-after-cms-trip-to-japan-s-korea.jpg',
                'published_at' => Carbon::create(2025, 8, 1),
            ],
            [
                'title' => 'India’s Chhattisgarh woos Korean firms with new industrial policy',
                'summary' => 'Investor Connect event in Seoul highlighted Chhattisgarh’s attractive incentives and ease of doing business.',
                'source_url' => 'https://www.koreaherald.com/article/10566177',
                'image_url' => 'https://wimg.heraldcorp.com/news/cms/2025/09/01/news-p.v1.20250828.72169dd6cbd34678b1939399dfa88a29_P1.jpeg',
                'published_at' => Carbon::create(2025, 9, 1),
            ],
            [
                'title' => 'Chhattisgarh launches Single Window System 2.0',
                'summary' => 'One-click digital platform to fast-track approvals and position the state as a national leader in ease of doing business.',
                'source_url' => 'https://timesofindia.indiatimes.com/city/raipur/chhattisgarh-unveils-single-window-system-2-0-aims-for-national-leadership-in-ease-of-doing-business/articleshow/122185793.cms',
                'image_url' => 'https://static.toiimg.com/thumb/msid-122185792,imgsize-30704,width-400,height-225,resizemode-72/122185792.jpg',
                'published_at' => Carbon::create(2025, 7, 1),
            ],
            [
                'title' => 'India’s first AI-based Data Centre Park foundation laid in Nava Raipur',
                'summary' => 'A landmark 14-acre project marking Chhattisgarh’s entry into next-generation digital infrastructure.',
                'source_url' => 'https://www.newindianexpress.com/thesundaystandard/2025/May/04/chhattisgarh-cm-lays-foundation-for-indias-first-ai-based-data-centre-park-in-nava-raipur',
                'image_url' => 'https://media.newindianexpress.com/newindianexpress%2F2025-05-04%2Fs4ud9w9s%2FGqAx8UdbAAANnYO.jpg?w=768&auto=format%2Ccompress&fit=max',
                'published_at' => Carbon::create(2025, 5, 1),
            ],
            [
                'title' => 'India’s first GaN semiconductor plant coming to Nava Raipur',
                'summary' => 'Foundation stone for Gallium Nitride chip manufacturing unit to power 5G/6G technologies.',
                'source_url' => 'https://economictimes.indiatimes.com/industry/cons-products/electronics/chhattisgarh-to-get-semiconductor-plant-gan-chips-to-power-5g-6g-from-nava-raipur/articleshow/120164033.cms',
                'image_url' => 'https://img.etimg.com/thumb/msid-120164086,width-300,height-225,imgsize-213394,resizemode-75,rect-214_33_1506_1130/chhattisgarh-to-get-semiconductor-plant-gan-chips-to-power-5g-6g-from-nava-raipur.jpg',
                'published_at' => Carbon::create(2025, 4, 1),
            ],
            [
                'title' => 'Adani Group to invest ₹65,000 crore in Chhattisgarh',
                'summary' => 'Major investments planned in energy, cement, and infrastructure sectors.',
                'source_url' => 'https://economictimes.indiatimes.com/industry/energy/power/adani-group-to-invest-rs-65k-crore-in-chhattisgarh-projects/articleshow/117179788.cms',
                'image_url' => 'https://img.etimg.com/thumb/msid-117179852,width-300,height-225,imgsize-151290,resizemode-75/raipur-jan-12-ani-adani-group-chairman-gautam-adani-meets-chhattisgarh-chief-.jpg',
                'published_at' => Carbon::create(2025, 1, 1),
            ],
            [
                'title' => '₹33,321 crore MoUs signed with Gujarat investors',
                'summary' => 'Investor Connect in Ahmedabad creates 14,900 jobs across multiple sectors.',
                'source_url' => 'https://www.aninews.in/news/national/general-news/investor-connect-chhattisgarh-gujarat-pact-seals-837733321-cr-deals-in-ahmedabad-creates-14900-jobs20251111171627/',
                'image_url' => 'https://d3lzcn6mbbadaf.cloudfront.net/media/details/ANI-20251111114610.jpg',
                'published_at' => Carbon::create(2025, 11, 1),
            ],
            [
                'title' => 'Chhattisgarh bags ₹3,100 cr in health & tourism investments',
                'summary' => 'State is building national identity in wellness, healthcare, and tourism sectors.',
                'source_url' => 'https://www.business-standard.com/amp/finance/news/chhattisgarh-bags-3-1k-cr-investment-proposals-in-health-tourism-sectors-125092401127_1.html',
                'image_url' => 'https://bsmedia.business-standard.com/_media/bs/img/article/2025-03/26/full/1742983859-3432.jpg',
                'published_at' => Carbon::create(2025, 3, 1),
            ],
        ];

        foreach ($items as $item) {
            MediaUpdate::updateOrCreate(
                ['title' => $item['title'], 'source_url' => $item['source_url']],
                $item
            );
        }
    }
}
