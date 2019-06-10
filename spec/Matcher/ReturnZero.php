<?php


namespace spec\Matcher;


use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Matcher\BasicMatcher;

final class ReturnZero extends BasicMatcher
{
    protected function matches($subject, array $arguments): bool
    {
        return $subject === 0;
    }

    protected function getFailureException(string $name, $subject, array $arguments): FailureException
    {
        return new FailureException(sprintf(
            'Expected %d to be zero',
            $subject
        ));
    }

    protected function getNegativeFailureException(string $name, $subject, array $arguments): FailureException
    {
        return new FailureException(sprintf(
            'Expected %d to be zero',
            $subject
        ));
    }

    public function supports(string $name, $subject, array $arguments): bool
    {
        return in_array($name, ['returnZero'])
            && is_numeric($subject)
            && count($arguments) === 0;
    }

}