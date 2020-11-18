<?php
/*ChoiceType::class,array('choices'=>$services,
            'choice_label' => function($service, $key, $value) {
            return strtoupper($service->getName());
            }))
            ->add('Submit',SubmitType::class,[
                'label'=>'Envoyer'
            ]*/

namespace App\Controller;


use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contact;
use App\Entity\Service;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @Route("/contact")
 */

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact")
     */
    public function index(ContactRepository $repocont,ObjectManager $manager,Request $req, \Swift_Mailer $mailer)
    {
        $contact=new Contact();

       /* $servrep=$this->getDoctrine()->getRepository(Service::class);

        $services=$servrep->findAll();*/

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($req);
        

        if($this->forSubmition($form)){
            dump($form);
            $to=$this->checkMail($form);

            $message = (new \Swift_Message($form->get('message')->getData()))
                    ->setFrom(trim($form->get('mail')->getData()))
                    ->setTo(trim($to));

            $mailer->send($message);
            
            $this->stockIt($manager,$contact);
            //return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' =>$form->createView(),  
        ]);
    }

    public function forSubmition($form){
        return ($form->isSubmitted() && $form->isValid());
    }

    public function stockIt(ObjectManager $manager,$data){
        $manager->persist($data);
        $manager->flush();
    }
    public function checkMail($form){
        if($form->get('servicer')->getData()->getMailOne()){
            return $form->get('servicer')->getData()->getMailOne();
        }else return $form->get('servicer')->getData()->getMail2();
    }
}
