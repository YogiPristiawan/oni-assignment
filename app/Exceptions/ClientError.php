<?php

namespace App\Exceptions;

use Exception;

class ClientError extends Exception
{
	public $mesasge, $statusCode;

	public function __construct($message, $statusCode = 400)
	{
		$this->message = $message;
		$this->statusCode = $statusCode;
	}
}
