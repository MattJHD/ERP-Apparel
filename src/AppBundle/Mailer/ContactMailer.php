<?php

namespace AppBundle\Mailer;

use Symfony\Component\Templating\EngineInterface;
use AppBundle\Entity\User;

/**
 * Class ContactMailer
 *
 */
class ContactMailer
{
    private $kernelRootDir;
    private $templating;
    private $mailer;
    private $mailerFromEmail;
    private $mailerToEmail;
    
    public function __construct($kernelRootDir, $templating, $mailer, $mailerFromEmail, $mailerToEmail)      
    {
        $this->kernelRootDir = $kernelRootDir;
        /**@var  EngineInterface*/
        $this->templating = $templating;
        /**@var SwiftMailer*/
        $this->mailer = $mailer;
        
        $this->mailerFromEmail = $mailerFromEmail;
        
        $this->mailerToEmail = $mailerToEmail;
    }

    
    public function sendPwd(User $user)
    {
        $message = \Swift_Message::newInstance();
            
            $appPath = $this->kernelRootDir;
             
            
            $bodyTxt = $this->templating->render('email/password.txt.twig',[
                'user'=>$user,
            ]);
            
            $bodyHtml = $this ->templating->render('email/password.html.twig',[
                'user'=>$user,
            ]);
                    
            $message 
                        ->setFrom($this->mailerFromEmail)
                        ->setTo($this->mailerToEmail)
                        ->setSubject('Votre mot de passe.')
                        ->setBody($bodyTxt, 'text/plain')
                        ->addPart($bodyHtml, 'text/html');
            
          
            
//            $this->mailer->send($message);
            // return pour le $count dans DefaultController 
            return $this->mailer->send($message);

    }
}
