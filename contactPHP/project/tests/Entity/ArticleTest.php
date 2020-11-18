<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use PHPUnit\Framework\TestCase;
use App\Entity\Article;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class ArticleTest extends TestCase
{
        public function testGetTitre(){
              $article=new Article();
              $article->setTitre("mon titre de test");
              $titre1="mon titre de test";
              $this->assertEquals($titre1,$article->getTitre());
        }

        public function testGetContenu(){
               $article=new Article();
               $article->setContenu("mon contenu test");
               $contenu1="mon contenu test";
               $this->assertEquals($contenu1,$article->getContenu());
        }

         public function testGetAuteur(){
                $article=new Article();
                $article->setAuteur("moi");
                $auteur1="moi";
                $this->assertEquals($auteur1,$article->getAuteur());
                }

         public function testGetEdition(){
                $article=new Article();
                $article->setEdition("moiencre");
                $edition1="moiencre";
                $this->assertEquals($edition1,$article->getEdition());
                 }

         public function testGetDate(){
                 $article=new Article();
                 $article->setDate("2019-02-27");
                 $date1="2019-02-27";
                 $this->assertEquals($date1,$article->getDate());
                 }


}
