<?php

namespace App\Controller;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogDetailsController extends AbstractController
{
    /**
     * @Route("/blog/details", name="blog_details")
     */
    public function index(CommentRepository $commentRepository, Request $request): Response

    {    
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $comment->setEmail($this->getUser());
            
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('comment_index');
        }
        return $this->render('blog_details/index.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
            'comments' => $commentRepository->findAll(),
            
        ]);
    }
}
