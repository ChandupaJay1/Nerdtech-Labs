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
            $referer = config('services.google_reviews.referer', 'https://nerdtechlabs.info');

            if ($apiKey && $placeId) {
                try {
                    $response = Http::timeout(8)
                        ->withHeaders([
                            'X-Goog-Api-Key' => $apiKey,
                            'X-Goog-FieldMask' => 'id,displayName,rating,userRatingCount,reviews',
                            'Referer' => $referer,
                        ])
                        ->get("https://places.googleapis.com/v1/places/{$placeId}");

                    if ($response->successful()) {
                        $result = $response->json();
                        $rating = (float) ($result['rating'] ?? 5.0);
                        $totalReviews = (int) ($result['userRatingCount'] ?? 3);

                        $rawReviews = $result['reviews'] ?? [];
                        $parsedReviews = [];

                        foreach ($rawReviews as $rev) {
                            $text = $rev['text']['text'] ?? ($rev['originalText']['text'] ?? '');
                            if (!empty(trim($text))) {
                                $parsedReviews[] = [
                                    'author_name' => $rev['authorAttribution']['displayName'] ?? 'Google Reviewer',
                                    'author_photo' => $rev['authorAttribution']['photoUri'] ?? asset('assets/img/home-5/author-img.png'),
                                    'rating' => (int) ($rev['rating'] ?? 5),
                                    'text' => trim($text),
                                    'time' => $rev['relativePublishTimeDescription'] ?? 'Google Review',
                                ];
                            }
                        }

                        $fallback = $this->getFallbackReviews();

                        return [
                            'rating' => $rating,
                            'total_reviews' => max($totalReviews, count($parsedReviews)),
                            'reviews' => !empty($parsedReviews) ? $parsedReviews : $fallback['reviews'],
                        ];
                    }

                    Log::warning('Google Places API returned status ' . $response->status() . ': ' . $response->body());
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
            'total_reviews' => 3,
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
