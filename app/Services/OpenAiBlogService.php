<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class OpenAiBlogService
{
    protected string $apiKey;

    protected string $model;

    public function __construct()
    {
        $this->apiKey = config('services.openai.api_key');
        $this->model = config('services.openai.model', 'gpt-4o-mini');
    }

    /**
     * Generate a full blog post (title, excerpt, content) from a topic.
     *
     * @return array{title: string, excerpt: string, content: string}
     */
    public function generateBlogPost(string $topic, string $tone = 'professional'): array
    {
        if (empty($this->apiKey)) {
            throw new RuntimeException('OpenAI API key is not configured. Set OPENAI_API_KEY in your .env file.');
        }

        $prompt = $this->buildPrompt($topic, $tone);

        $response = Http::withToken($this->apiKey)
            ->timeout(60)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $this->model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a professional content writer for a construction company website. '
                            . 'Always respond with valid JSON only, no markdown code fences, matching this exact '
                            . 'shape: {"title": string, "excerpt": string (max 160 chars), "content": string (HTML, '
                            . 'using <h2>, <h3>, <p>, <ul> tags, 500-800 words)}.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'temperature' => 0.7,
                'response_format' => ['type' => 'json_object'],
            ]);

        if ($response->failed()) {
            Log::error('OpenAI blog generation failed', ['body' => $response->body()]);
            throw new RuntimeException('Failed to generate blog content. Please try again.');
        }

        $raw = $response->json('choices.0.message.content');
        $decoded = json_decode($raw, true);

        if (! is_array($decoded) || ! isset($decoded['title'], $decoded['content'])) {
            throw new RuntimeException('Received an unexpected response format from the AI service.');
        }

        return [
            'title' => $decoded['title'],
            'excerpt' => $decoded['excerpt'] ?? '',
            'content' => $decoded['content'],
        ];
    }

    protected function buildPrompt(string $topic, string $tone): string
    {
        return "Write a blog post for a construction company about: \"{$topic}\". "
            . "Tone: {$tone}. Audience: homeowners and commercial clients researching construction services. "
            . 'Include practical insights and at least one actionable tip. Return JSON only.';
    }
}
