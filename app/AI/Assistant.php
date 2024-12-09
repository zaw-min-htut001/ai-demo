<?php

namespace App\AI;


class Assistant
{
    public static function chat(array $messages)
    {
        return app('openai')->chat()->create([
            "model"=> "gpt-4o",
            "messages"=> $messages,
        ]);
    }

    public static function visualize(string $description)
    {
        return app('openai')->images()->create([
            "model" => "dall-e-3",
            "prompt" => $description,
        ])->data[0]->url;
    }

    public static function speech(string $prompt)
    {
        return app('openai')->audio()->speech([
            "model" => "tts-1",
            "input" => $prompt,
            "voice" => "alloy",
            "speech" => true,
        ]);
    }
}
