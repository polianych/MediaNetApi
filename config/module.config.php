<?php

/**
 * @link        https://github.com/polianych/MediaNetApi for the canonical source repository
 * @license     http://framework.zend.com/license/new-bsd New BSD License
 * @author      Alex Poliakov <poliakov.o@gmail.com>
 * @package     MediaNetApi;
 */
return array(
    'service_manager' => array(
        'factories' => array(
            'MediaNetApi' => 'TuneHog\MediaNetApi\MediaNetApiServiceFactory',
        )
    ),
);