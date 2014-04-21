<?php
/**
 * @link http://www.codeexpert.pl/
 * @copyright Piotr Grzelka
 * @license http://www.yiiframework.com/license/
 */

namespace codeexpert\log;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use yii\log\Target;

/**
 *
 */
class FirePHPTarget extends Target
{

    /**
     * Initializes the route.
     * This method is invoked after the route is created by the route manager.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Writes log messages to FirePHP.
     */
    public function export()
    {
        $text = implode("\n", array_map([$this, 'formatMessage'], $this->messages)) . "\n";

        $firephp = FirePHP::getInstance(true);
//
//        $var = array('i'=>10, 'j'=>20);
//
//        $firephp->log($var, 'Iterators');
//        return $text;
    }
}