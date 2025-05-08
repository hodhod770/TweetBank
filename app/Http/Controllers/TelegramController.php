<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    private $botToken = '7831706096:AAFJ0EK8APsbT86ZbS8C13uHmXuumL7LcKg';
    private $allowedUserId = '7892566171';
    private $channelId = '@media_bank_ye';

    public function webhook(Request $request)
    {
        $data = $request->all();
        $message = $data['message'] ?? null;

        if (!$message || $message['from']['id'] != $this->allowedUserId) {
            $this->sendText($message['chat']['id'], '❌ غير مصرح لك باستخدام هذا البوت');
            return response()->noContent();
        }

        $originalText = $message['text'] ?? $message['caption'] ?? '';
        $tweetUrl = 'https://twitter.com/intent/tweet?text=' . urlencode($originalText);
        $cleanedText = preg_replace('/https?:\/\/\S+/', '', $originalText);
        $cleanedText = trim($cleanedText);

        $keyboard = [
            'inline_keyboard' => [[
                ['text' => '🕊️ غرد الآن', 'url' => $tweetUrl]
            ]]
        ];

        if (isset($message['photo'])) {
            $fileId = end($message['photo'])['file_id'];
            $this->sendMedia('sendPhoto', $fileId, $cleanedText, $keyboard);
        } elseif (isset($message['video'])) {
            $this->sendMedia('sendVideo', $message['video']['file_id'], $cleanedText, $keyboard);
        } elseif (isset($message['document'])) {
            $this->sendMedia('sendDocument', $message['document']['file_id'], $cleanedText, $keyboard);
        } elseif (isset($message['text'])) {
            $this->sendText($this->channelId, $cleanedText, $keyboard);
        } else {
            $this->sendText($message['chat']['id'], '⚠️ نوع المحتوى غير مدعوم.');
        }

        return response()->noContent();
    }

    private function sendText($chatId, $text, $keyboard = null)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";

        $payload = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        if ($keyboard) {
            $payload['reply_markup'] = json_encode($keyboard);
        }

        Http::post($url, $payload);
    }

    private function sendMedia($method, $fileId, $caption, $keyboard)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/{$method}";

        $payload = [
            'chat_id' => $this->channelId,
            'caption' => $caption,
            'reply_markup' => json_encode($keyboard),
        ];

        if ($method === 'sendPhoto') {
            $payload['photo'] = $fileId;
        } elseif ($method === 'sendVideo') {
            $payload['video'] = $fileId;
        } elseif ($method === 'sendDocument') {
            $payload['document'] = $fileId;
        }

        Http::post($url, $payload);
    }
}

