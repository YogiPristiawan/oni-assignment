<?php

namespace App\Helpers;

use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseHelper
{
	private $messaging;

	public function __construct(Messaging $messaging)
	{
		$this->messaging = $messaging;
	}

	public function sendMessage(string $fcmToken, array $payload)
	{
		$message = CloudMessage::fromArray([
			'token' => $fcmToken,
			'notification' => [
				'title' => $payload['title'],
				'body' => $payload['body'],
				'image' => $payload['image'] ?? null,
			],
			'data' => [
				'title' => $payload['title'],
				'body' => $payload['body'],
				'click_action' => $payload['click_action'] ?? null
			],
		]);

		return $this->messaging->send($message);
	}

	public function senMessageMulticast(array $fcmTokens, array $payload)
	{
		$message  = CloudMessage::fromArray([
			'notification' => [
				'title' => $payload['title'],
				'body' => $payload['body'],
				'image' => $payload['image'] ?? null,
			],
			'data' => [
				'title' => $payload['title'],
				'body' => $payload['body'],
				'click_action' => $payload['click_action'] ?? null
			],
		]);

		return $this->messaging->sendMulticast($message, $fcmTokens);
	}
}
