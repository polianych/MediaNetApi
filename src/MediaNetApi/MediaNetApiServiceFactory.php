<?php
namespace MediaNetApi;

/**
 * @author Alex Poliakov <poliakov.o@gmail.com>
 */

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use MediaNetApi\MediaNetOptions;
use MediaNetApi\MediaNetApi;

class MediaNetApiServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        if (!isset($config['medianet_api'])) {
            throw new \Exception('Missing mediant_api config');
        }
        $config = $config['medianet_api'];
        $options = new MediaNetOptions($config);
        $mediaNetApi = new MediaNetApi($options);
        return $mediaNetApi;
    }

}
