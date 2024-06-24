<?php

namespace App\Exceptions;

use App\Exceptions\ClientError;

class AuthenticationError extends ClientError
{
	public function __construct($message)
	{
		parent::__construct($message, 401);
	}
}
