<?php
namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use App\Entity\Article;
use App\Controller\ArticleController;

class ArticleControllerTest extends TestCase
{
        /** @var ArticleController|PHPUnit_Framework_MockObject_MockObject */
        private $articleControllerMock;

        private $articleController;
        protected function setUp()
        {
            $this->articleControllerMock = $this->getMockBuilder(ArticleController::class)
                ->disableOriginalConstructor()
                ->getMock();
        }

        protected function tearDown()
        {
                $this->articleControllerMock = null;
        }

         public function testgetRequests()
         {
                assertTrue(yield ['GET', '/article']);
                assertTrue(yield ['POST', '/article/new']);
                assertTrue(yield ['GET', '/article/2']);
                assertTrue(yield ['POST', '/article/2/edit']);
                assertTrue(yield ['DELETE', '/article/2']);

         }

         /**
          * @dataProvider provideUrls
          */
         public function testPageIsSuccessful($url)
         {
             $articleController=new ArticleController();
             $articleController = show();
             $articleController->request('GET', $url);
             $this->assertTrue($articleController->getResponse()->isSuccessful());
         }


}