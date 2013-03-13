<?php
/**
 * @link        https://github.com/polianych/MediaNetApi for the canonical source repository
 * @license     http://framework.zend.com/license/new-bsd New BSD License
 * @author      Alex Poliakov <poliakov.o@gmail.com>
 * @package     MediaNetApi;
 */
namespace MediaNetApi;

class Module
{
    public function getConfig()
    {
        $config = include __DIR__ . '/config/module.config.php';
        return $config;
    }
}