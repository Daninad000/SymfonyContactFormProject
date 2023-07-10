<?php
// src/Controller/ContactController.php
namespace App\Controller;

use App\Entity\Question;
use App\Form\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_submit", methods={"GET", "POST"})
     */
    
    /*
    public function submit(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if ($name && $email && $message) {
                $question = new Question();
                $question->setName($name);
                $question->setEmail($email);
                $question->setMessage($message);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($question);
                $entityManager->flush();

                return $this->redirectToRoute('contact_success');
            } else {
                return $this->render('contact/error.html.twig');
            }
        }

        return $this->render('contact/index.html.twig');
    }
    */


    // Ez a jól működő kód
    /*
    public function submit(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Űrlap adatainak feldolgozása
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if ($name && $email && $message) {
                // Ha minden mező ki van töltve
                $question = new Question();
                $question->setName($name);
                $question->setEmail($email);
                $question->setMessage($message);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($question);
                $entityManager->flush();

                return $this->redirectToRoute('contact_success');
            } else {
                // Ha valamelyik mező üres
                return $this->render('contact/error.html.twig');
            }
        }

        return $this->render('contact/index.html.twig');
    }
    */

    /**
     * @Route("/contact", name="contact_submit", methods={"GET", "POST"})
     */
    /*
    public function submit(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Űrlap adatainak feldolgozása
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if ($name && $email && $message) {
                // Ha minden mező ki van töltve
                $question = new Question();
                $question->setName($name);
                $question->setEmail($email);
                $question->setMessage($message);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($question);
                $entityManager->flush();

                return $this->redirectToRoute('contact_success');
            } else {
                // Ha valamelyik mező üres
                return $this->render('contact/error.html.twig', [
                    'errorMessage' => 'Hiba! Kérjük töltsd ki az összes mezőt.',
                ]);
                
            }
        }

        return $this->render('contact/index.html.twig');
    }
    */

    /*
    public function submit(Request $request): Response
    {
        $question = new Question();
        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Az űrlap adatok feldolgozása, ha minden mező valid
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    */

    /*
    public function submit(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Űrlap adatainak feldolgozása
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if ($name && $email && $message) {
                // Ha minden mező ki van töltve
                $question = new Question();
                $question->setName($name);
                $question->setEmail($email);
                $question->setMessage($message);

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($question);
                $entityManager->flush();

                return $this->redirectToRoute('contact_success');
            } else {
                // Ha valamelyik mező üres
                $formError = new FormError('Hiba! Kérjük töltse ki az összes mezőt.');

                $form = $this->createFormBuilder()
                    ->setAction($this->generateUrl('contact_submit'))
                    ->add('name', TextType::class, ['required' => true])
                    ->add('email', EmailType::class, ['required' => true])
                    ->add('message', TextareaType::class, ['required' => true])
                    ->add('submit', SubmitType::class)
                    ->getForm();

                $form->addError($formError);

                return $this->render('contact/index.html.twig', [
                    'form' => $form->createView(),
                ]);
            }
        }

        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_submit'))
            ->add('name', TextType::class, ['required' => true])
            ->add('email', EmailType::class, ['required' => true])
            ->add('message', TextareaType::class, ['required' => true])
            ->add('submit', SubmitType::class)
            ->getForm();

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    */

    /*
    public function submit(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Ha minden mező ki van töltve
            $data = $form->getData();

            $question = new Question();
            $question->setName($data['name']);
            $question->setEmail($data['email']);
            $question->setMessage($data['message']);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('contact_success');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    */

    public function submit(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Űrlap adatainak feldolgozása
            $name = $request->request->get('name');
            $email = $request->request->get('email');
            $message = $request->request->get('message');

            if (empty($name) || empty($email) || empty($message)) {
                // Ha valamelyik mező üres
                $form = $this->createFormBuilder()
                    ->add('name', TextType::class, [
                        'required' => true,
                        'attr' => ['placeholder' => 'Name']
                    ])
                    ->add('email', EmailType::class, [
                        'required' => true,
                        'attr' => ['placeholder' => 'Email']
                    ])
                    ->add('message', TextareaType::class, [
                        'required' => true,
                        'attr' => ['placeholder' => 'Message']
                    ])
                    ->getForm();

                $form->addError(new FormError('Hiba! Kérjük töltsd ki az összes mezőt.'));

                return $this->render('contact/index.html.twig', [
                    'form' => $form->createView(),
                ]);
            }

            // Ha minden mező ki van töltve
            $question = new Question();
            $question->setName($name);
            $question->setEmail($email);
            $question->setMessage($message);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            return $this->redirectToRoute('contact_success');
        }

        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Name']
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Email']
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
                'attr' => ['placeholder' => 'Message']
            ])
            ->getForm();

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contact/error", name="contact_error", methods={"GET"})
     */
    public function error(): Response
    {
        return $this->render('contact/error.html.twig');
    }



    /**
     * @Route("/contact/back", name="contact_back", methods={"GET"})
     */
    public function back(): Response
    {
        return $this->redirectToRoute('contact_index');
    }


    /**
     * @Route("/contact/success", name="contact_success", methods={"GET"})
     */
    public function success(): Response
    {
        return $this->render('contact/success.html.twig', [
            'success' => true,
        ]);
    }

    /**
     * @Route("/contact/failure", name="contact_failure", methods={"GET"})
     */
    public function failure(): Response
    {
        return $this->render('contact/success.html.twig', [
            'success' => false,
        ]);
    }


}


