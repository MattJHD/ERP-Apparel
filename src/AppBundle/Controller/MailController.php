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
            
            /*$name = $_POST['last_name'];
            $firstName = $_POST['first_name'];
            $email = $_POST['email'];
            $body = $_POST['message'];*/
    
            $name = 'testname';
            $firstName = 'testfirstname';
            $email = 'testmail';
            $body = 'bla bla bla';

            $this->get('mailer.mailer_website')->sendMail($name, $firstName, $email, $body);
            
            return new Response("OK");
       
        
    }
}
