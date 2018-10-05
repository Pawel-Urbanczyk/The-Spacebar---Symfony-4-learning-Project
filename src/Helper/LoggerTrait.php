<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 05.10.2018
 * Time: 12:42
 */

namespace App\Helper;


use Psr\Log\LoggerInterface;

trait LoggerTrait
{

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger){

        $this->logger = $logger;

    }

    public function logInfo(string $message, array $context = [])
    {
        if($this->logger){
            $this->logger->info($message,$context);
        }
    }


}