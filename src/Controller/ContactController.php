<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;



/**
 * Class ContactController
 * @package App\Controller
 * @Route("/contact")
 */

class ContactController extends AbstractController
{

    /**
     * Page de Contact
     * @Route("/", name="contact_contact", methods={"GET|POST"})
     * @see https://symfony.com/doc/current/forms.html#installation
     * @see https://symfony.com/doc/current/reference/forms/types.html
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(Request $request, MailerInterface $mailer)
    {

        # 1. Conception du Formulaire
        $form = $this->createFormBuilder()
            ->add('prenom', TextType::class)
            ->add('nom', TextType::class)
            ->add('adresse', TextType::class)
            ->add('email', EmailType::class)
            ->add('tel', TelType::class)
            ->add('sujet', TextType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class)
            ->getForm(); # Permet de retourner le formulaire

        # 2. Traitement du Formulaire
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            # 3. Récupération des données du formulaire
            $data = $form->getData();

            # 4. Envoi du Mail
            $email = (new Email())
                ->from('noreply@autorent57.com')
                ->to('contact@autorent57.com')
                ->subject($data['sujet'])
                ->html('<p>Vous avez reçu une demande de ' . $data['prenom'] . '</p>');

            $mailer->send($email);

            # 5. Notification
            $this->addFlash('success', 'Merci, nous avons bien reçu votre demande.');

            # 6. Redirection
            return $this->redirectToRoute('contact_contact');

        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

