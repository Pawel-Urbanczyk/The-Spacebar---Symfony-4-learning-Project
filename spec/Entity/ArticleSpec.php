<?php


namespace spec\App\Entity;


use App\Entity\Article;
use App\Entity\Comment;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\ObjectBehavior;

class ArticleSpec extends ObjectBehavior
{
//    public function getMatchers(): array
//    {
//        return[
//            'returnZero' => function($subject){
//                if($subject !== 0){
//                    throw new FailureException(sprintf('Return value should be zero, go "%s"', $subject));
//                }
//                return true;
//            }
//        ];
//    }

    function it_should_default_to_zero_hearts()
    {
        $this->getHeartCount()->shouldReturn(0);
    }
    function it_should__default_to_zero_using_custom_matcher()
    {
        $this->getHeartCount()->shouldReturnZero();
    }

    function it_allow_to_set_content()
    {
        $this->setContent('Testing Content');
        $this->getContent()->shouldReturn('Testing Content');
    }

    function it_adding_comment_works_correctly(Article $article)
    {
        $this->addComment(new Comment());
        $this->addComment(new Comment());
        $this->getComments()->shouldHaveCount(2);

    }

    function it_should_allow_content_to_be_null()
    {
        $this->setContent(null);
        $this->getContent()->shouldBeNull();
    }




}