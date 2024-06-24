<?php

namespace App\Exceptions;

use App\Exceptions\ClientError;
use Exception;

class InvariantError extends ClientError
{
	public function __construct($message)
	{
		parent::__construct($message);
	}
}
