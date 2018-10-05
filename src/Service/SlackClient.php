<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 05.10.2018
 * Time: 12:21
 */

namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;
use Psr\Log\LoggerInterface;

class SlackClient
{

    use LoggerTrait;

    private $slack;


    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }



    public function sendMessage(string $from, string $message)
    {
      $this->logInfo('Beaming a message to Slack!',[
         'message'=>$message
      ]);

        $slackMessage = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message)
        ;


        $this->slack->sendMessage($slackMessage);

    }

}