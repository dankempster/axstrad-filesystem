<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Controller;

use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File;
use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Event;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

new Template(array());

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Controller\DefaultController
 */
class DefaultController extends Controller
{
    /**
     * @Template("AxstradTestHttpFileUploadBundle:Default:showForm.html.twig")
     */
    public function uploadFileAction(Request $request)
    {
        $file = new File();
        $form = $this->createFormBuilder($file,
            array(
                'method' => "post",
            ))
            ->add('file', 'file')
            ->add('submit', 'submit')
            ->getForm();

        $form->handleRequest($request);

        // var_dump($form->isValid(), $form->getErrorsAsString(), $request->files);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($file);
            $em->flush();

            return $this->redirect("/upload-file");
        }
        else {
            echo $form->getErrorsAsString();
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template("AxstradTestHttpFileUploadBundle:Default:showForm.html.twig")
     */
    public function createEventAction(Request $request)
    {
        $event = new Event;
        $fb = $this->createFormBuilder($event, array(
            'method' => 'post',
        ));
        $form = $fb
            ->add('title')
            ->add('file', 'file')
            ->add('submit', 'submit')
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($event);
            $em->flush();

            return $this->redirect("/create-event");
        }
        else {
            echo $form->getErrorsAsString();
        }

        return array('form' => $form->createView());
    }
}
