<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GoogleReviewService
{
    /**
     * Get Google Reviews data (from cache or API or fallback).
     *
     * @return array
     */
    public function getReviewsData(): array
    {
        return Cache::remember('google_reviews_cache', 86400, function () {
            $apiKey = config('services.google_reviews.api_key');
            $placeId = config('services.google_reviews.place_id');

            if ($apiKey && $placeId) {
                try {
                    $response = Http::timeout(6)->get('https://maps.googleapis.com/maps/api/place/details/json', [
                        'place_id' => $placeId,
                        'fields' => 'name,rating,reviews,user_ratings_total',
                        'key' => $apiKey,
                    ]);

                    if ($response->successful() && ($response->json('status') === 'OK')) {
                        $result = $response->json('result');

                        $reviews = collect($result['reviews'] ?? [])->map(function ($rev) {
                            return [
                                'author_name' => $rev['author_name'] ?? 'Verified Client',
                                'author_photo' => $rev['profile_photo_url'] ?? asset('assets/img/home-5/author-img.png'),
                                'rating' => $rev['rating'] ?? 5,
                                'text' => $rev['text'] ?? '',
                                'time' => $rev['relative_time_description'] ?? 'Recently',
                            ];
                        })->filter(fn ($r) => !empty($r['text']))->values()->all();

                        if (!empty($reviews)) {
                            return [
                                'rating' => $result['rating'] ?? 5.0,
                                'total_reviews' => $result['user_ratings_total'] ?? count($reviews),
                                'reviews' => $reviews,
                            ];
                        }
                    } else {
                        Log::warning('Google Places API returned non-OK status: ' . ($response->json('status') ?? 'Unknown'));
                    }
                } catch (\Throwable $e) {
                    Log::warning('GoogleReviewService error: ' . $e->getMessage());
                }
            }

            return $this->getFallbackReviews();
        });
    }

    /**
     * Fallback reviews if API is not yet configured or fails.
     *
     * @return array
     */
    protected function getFallbackReviews(): array
    {
        return [
            'rating' => 5.0,
            'total_reviews' => 5,
            'reviews' => [
                [
                    'author_name' => 'Sagaki All In One',
                    'author_photo' => asset('assets/img/home-5/author-img.png'),
                    'rating' => 5,
                    'text' => 'NerdTech Labs built our business management and weekly fair platform from scratch. The system handles stall bookings, invoicing, and real-time operations seamlessly. Outstanding commitment and quality!',
                    'time' => 'Kirindiwela Weekly Fair',
                ],
                [
                    'author_name' => 'Enterprise Solutions',
                    'author_photo' => asset('assets/img/home-5/author-img2.png'),
                    'rating' => 5,
                    'text' => 'From concept to deployment, NerdTech Labs delivered a modern, fast, and secure web platform. Their full-stack expertise, clear communication, and dedicated support made the entire project smooth and successful.',
                    'time' => 'Web & Cloud Solutions',
                ],
                [
                    'author_name' => 'Corporate Client',
                    'author_photo' => asset('assets/img/home-5/author-img3.png'),
                    'rating' => 5,
                    'text' => 'They developed a custom tax invoice manager and inventory workflow that automated our billing process completely. Highly recommend NerdTech Labs for any custom software development!',
                    'time' => 'Custom Software System',
                ],
            ],
        ];
    }
}
