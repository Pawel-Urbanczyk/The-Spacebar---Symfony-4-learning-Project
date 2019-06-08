<?php


namespace App\Tests\Entity;


use App\Entity\Article;
use App\Entity\User;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ArticleIntegrationTest extends KernelTestCase
{
    private $entityManager;
    public function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        //$this->truncateEntities();
    }

//    private function truncateEntities()
//    {
//        $purger = new ORMPurger(self::bootKernel()->getContainer()
//            ->get('doctrine')
//            ->getManager());
//        $purger->purge();
//    }

    public function testThatWeCouldAddArticleToDB()
    {

        $articles = $this->entityManager
            ->getRepository(Article::class)
            ->findAll();

        //After load's 10 fixtures
        $this->assertCount(10, $articles);

//        /** @var  Article $article */
//        $article = self::$kernel->getContainer()->get('test.'.Article::class);


//        $article->setContent('abc');
//        $article->setAuthor(User::class);
//        $article->setTitle('ABC');
//        $article->setHeartCount(15);
//        $article->setSlug('abc');

//        /** @var EntityManager $em */
//        $em = self::$kernel->getContainer()
//            ->get('doctrine')
//            ->getManager();
//
//        $count = (int) $em->getRepository(Article::class)
//            ->createQueryBuilder('a')
//            ->select('COUNT(a.id)')
//            ->getQuery()
//            ->getSingleScalarResult();
//
//        $this->assertSame(1, $count, 'Amount of Article in no the same');
   }
}
