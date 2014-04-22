<?php
/**
 * @link https://github.com/pgrzelka/yii2-firephp
 * @author Piotr Grzelka
 * @license MIT
 */

namespace codeexpert\log;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use yii\log\Logger;
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
        $firephp = \FirePHP::getInstance(true);

        try {
            foreach ($this->messages as $message) {

                switch ($message[1]) {
                    case Logger::LEVEL_ERROR:
                        $firephp->error($message[0], $message[2]);
                        break;
                    case Logger::LEVEL_WARNING:
                        $firephp->warn($message[0], $message[2]);
                        break;
                    case Logger::LEVEL_INFO:
                        $firephp->info($message[0], $message[2]);
                        break;
//                    case Logger::LEVEL_TRACE:
//                        $firephp->log($message[0]);
//                        break;
                    default:
                        $firephp->log($message[0], $message[2]);
                        break;
//                    case Logger::LEVEL_PROFILE:
//                        $firephp->log($message[0], $message[2]);
//                        break;
//                    case Logger::LEVEL_PROFILE_BEGIN:
//                        $firephp->log($message[0], $message[2]);
//                        break;
//                    case Logger::LEVEL_PROFILE_END:
//                        $firephp->log($message[0], $message[2]);
//                        break;
                }
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}