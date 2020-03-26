<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Articles;
use App\Entity\Categories;


class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article")
     */
    public function show()
    {
        // on appele tous les articles
        $repository = $this->getDoctrine()->getRepository(Articles::class);
        $articles = $repository->findAll();
        $repo = $this->getDoctrine()->getRepository(Categories::class);
        $category = $repo->findAll();
        return $this->render('article/index.html.twig', [
            'articles'=>$articles,'category' => $category
        ]);
    } 

    /**
     * @Route("/category/index/{id}", name="show_cate")
     */
    public function showCate($id)
    {
        $repo = $this->getDoctrine()->getRepository(Articles::class);
        $articles= $repo->findBy([
            'idcategory' => $id 
        ]);
       
         return $this->render('category/index.html.twig', [
             'articles' => $articles,
         ]);
    }
      
        
   
    /**
     * @Route("/{id}", name="show_article")
     */
    public function showArticle($id)
    {
        // on appele un article depuis son id 
        $repository = $this->getDoctrine()->getRepository(Articles::class);
        $article = $repository->find($id);
        return $this->render('article/show_article.html.twig', [
            'article' => $article
        ]);
    }   
 
     
}
