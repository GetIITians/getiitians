<?php

namespace app\Helpers;

use App\Helpers\Contracts\RocketShipContract;

class RocketLauncher implements RocketShipContract
{

	public function blastOff()
	{

		return 'Houston, we have launched!';

	}

}