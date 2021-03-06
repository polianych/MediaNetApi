<?php
/**
 * @link        https://github.com/polianych/MediaNetApi for the canonical source repository
 * @license     http://framework.zend.com/license/new-bsd New BSD License
 * @author      Alex Poliakov <poliakov.o@gmail.com>
 * @package     MediaNetApi;
 */
return function ($class) {
    static $map;
    if (!$map) {
        $map = include __DIR__ . '/autoload_classmap.php';
    }

    if (!isset($map[$class])) {
        return false;
    }
    return include $map[$class];
};