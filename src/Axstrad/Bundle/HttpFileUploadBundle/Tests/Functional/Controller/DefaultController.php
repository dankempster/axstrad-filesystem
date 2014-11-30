<?php
namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Controller;

use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\File;
use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Image;
use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Page;
use Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Form\ImageType;
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

        return array('form' => $form->createView());
    }

    /**
     * @Template("AxstradTestHttpFileUploadBundle:Default:showForm.html.twig")
     */
    public function createImageAction(Request $request)
    {
        // $image = new Image;
        $form = $this->createForm(new ImageType);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($form->getData());
            $em->flush();

            return $this->redirect("/create-image");
        }

        return array('form' => $form->createView());
    }

    /**
     * @Template("AxstradTestHttpFileUploadBundle:Default:showForm.html.twig")
     */
    public function createPageAction(Request $request)
    {
        $page = new Page;
        $fb = $this->createFormBuilder($page, array(
            'method' => 'post',
        ));
        $form = $fb
            ->add('heading')
            ->add('copy')
            ->add('image', new ImageType)
            ->add('submit', 'submit')
            ->getForm()
        ;

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($page);
            $em->persist($page->image);
            $em->flush();

            return $this->redirect("/create-page");
        }

        return array('form' => $form->createView());
    }
}
