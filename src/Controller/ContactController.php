<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact.index')]
    public function index(Request $request, EntityManagerInterface $manager, MailerInterface $mailer)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                $contact = $form->getData();

                $manager->persist($contact);
                $manager->flush();


                $email = (new TemplatedEmail())
                    ->from('noreplay@domaine.com')
                    ->to($contact->getDestinataire())
                    ->subject('Formulaire de contact: ' . $contact->getPrenom())
                    ->htmlTemplate('email/contact.html.twig')
                    ->context([
                        'contact' => $contact,

                    ]);
                $mailer->send($email);

                unset($contact);
                unset($form);
                $contact = new Contact();
                $form = $this->createForm(ContactType::class, $contact);



                $this->addFlash(
                    'success',
                    'Nous vous remercions pour votre intérêt, votre message a été envoyé.'
                );

                return $this->redirectToRoute('contact.index');
            } else {
                $this->addFlash(
                    'danger',
                    'Erreur'
                );
            }
        }



        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/', name: 'home.index')]
    public function home()
    {
        return $this->render('home.html.twig');
    }
}
