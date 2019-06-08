<?php


namespace App\Tests\Entity;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;
    public function setUp()
    {
        $this->user = new User();
    }

    public function testSettingUsername()
    {
        $this->user->setFirstName('Pawel');
        $this->assertSame('Pawel', $this->user->getFirstName());
    }

    public function testGetUser()
    {
        $this->user->setEmail('abc@o2.pl');
        $this->user->setFirstName('bob');
        $this->user->setPassword('12345');

        $userEmail = $this->user->getEmail();
        $userFN = $this->user->getFirstName();
        $userPass = $this->user->getPassword();

        $this->assertInstanceOf(User::class, $this->user);
        $this->assertEquals($userEmail, 'abc@o2.pl');
        $this->assertEquals($userFN, 'bob');
        $this->assertEquals($userPass, '12345');
    }

    public function testSettingCorrectEmail()
    {

        $this->user->setEmail('bob@o2.pl');

        $this->assertRegExp('/^.+\@\S+\.\S+$/' ,$this->user->getEmail(), 'Your Email address have not any "@" sign');
    }

    public function testThatEmailIsNotTooShort()
    {
        $this->user->setEmail('as@wp.pl');

        $this->assertGreaterThan(7, strlen($this->user->getEmail()), 'Email too short');
   }

    public function testThatGetUserWithMock()
    {
        $user = $this->createMock(User::class);
        $user->expects($this->once())
            ->method('getEmail')
            ->willReturn('john@o2.pl');

        $user->expects($this->once())
            ->method('getFirstName')
            ->willReturn('john');

        $user->expects($this->once())
            ->method('getPassword')
            ->willReturn('54321');


        $this->assertEquals($user->getEmail(), 'john@o2.pl');
        $this->assertEquals($user->getFirstName(), 'john');
        $this->assertEquals($user->getPassword(), '54321');
    }

}