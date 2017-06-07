<?php

namespace AppBundle\Mailer;

use Symfony\Component\Templating\EngineInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class ContactMailer
 *
 */
class MailerWebsite
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


    public function sendMail($name, $firstName, $email, $body)
    {
        $message = \Swift_Message::newInstance();
            
            $appPath = $this->kernelRootDir;
                    
            $message 
                        ->setFrom($this->mailerFromEmail)
                        ->setTo($this->mailerToEmail)
                        ->setSubject('test')
                        ->setBody($body, 'text/plain');
            
          
            
//            $this->mailer->send($message);
            // return pour le $count dans DefaultController 
            return $this->mailer->send($message);

    }
}
