<?php

namespace spec\App\Entity;

use App\Entity\User;
use PhpSpec\ObjectBehavior;

class UserSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }


}