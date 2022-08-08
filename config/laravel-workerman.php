<?php

return [

    /**
     * Listen port for SocketIO client.
     */
    'server' => [
		'port' => 8890,
	],
	
	/**
	 * Events dispatched when SocketIO server is running.
	 */
	'events' => [
		App\Modules\KYCModule\Events\Progress::class,
	],
];