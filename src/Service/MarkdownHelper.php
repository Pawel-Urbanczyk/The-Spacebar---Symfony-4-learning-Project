<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 03.10.2018
 * Time: 11:09
 */

namespace App\Service;


use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{

    private $cache;
    private $markdown;
    private $logger;
    private $isDebug;

    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown, LoggerInterface $markdownLogger, bool $isDebug)
    {

        $this->markdown = $markdown;
        $this->cache = $cache;
        $this->logger = $markdownLogger;
        $this->isDebug = $isDebug;
    }

    public function parse(string $source): string
    {
        if(stripos($source, 'bacon') !== false){

            $this->logger->info('They are talking about bacon again!');

        }

        if($this->isDebug){
            return $this->markdown->transform($source);
        }

        $item = $this->cache ->getItem('markdown_'.md5($source));
        if(!$item->isHit()){
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }

        return $item->get();
    }

}