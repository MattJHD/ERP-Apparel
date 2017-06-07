<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use JMS\Serializer\SerializerBuilder;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Description of UserController
 *
 * @author matthieudurand
 * 
 */
class MailController extends Controller{
    
     /**
     * @Route("/mail")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Mail de contact website",
     *  filters={
     *      {"name"="mail", "dataType"="string"}
     *  }
     * )
     */
    public function postMailAction(Request $request){
            
           /* $serializer = SerializerBuilder::create()->build();
        
            //$jsonData = '{"id":"","role":"","name":"nameTestPostUser","firstname":"firstnameTestPostUser","login":"loginTestPostUser","password":"passwordtestPostUser","email":"emailTestPostUser","phone":"123456","function":"functionTestPostUser","date_creation":"","isactive":"1"}';
            $jsonData = $request->getContent();
            dump($jsonData);
            die();*/
            $name = $_POST['last_name'];
            $firstName = $_POST['first_name'];
            $email = $_POST['email'];
            $body = $_POST['message'];
    
            /*$name = 'testname';
            $firstName = 'testfirstname';
            $email = 'testmail';
            $body = 'bla bla bla';*/

            $this->get('mailer.contact_mailer')->sendMail($name, $firstName, $email, $body);
            
            //return new Response("OK");

            return $this->redirect('http://localhost/ERP-Apparel-Website/index.html#/contact/success');
       
        
    }
}
