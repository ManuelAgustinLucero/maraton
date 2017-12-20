<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Corredor;
use AppBundle\Form\CorredorType;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Corredor controller.
 *
 * @Route("/corredor")
 */
class CorredorController extends Controller
{
    /**
     * Lists all Corredor entities.
     *
     * @Route("/", name="corredor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $corredors = $em->getRepository('AppBundle:Corredor')->findAll();

        return $this->render('corredor/index.html.twig', array(
            'corredors' => $corredors,
        ));
    }

    /**
     * Creates a new Corredor entity.
     *
     * @Route("/new", name="corredor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $corredor = new Corredor();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm('AppBundle\Form\CorredorType', $corredor);
        $form->get('formapago')->setData($em->getReference('AppBundle:FormaPago', 2));
        $form->get('tipocarrera')->setData($em->getReference('AppBundle:TipoCarrera', 1));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($corredor);
            $em->flush();

            return $this->redirectToRoute('corredor_show', array('id' => $corredor->getId()));
        }

        return $this->render('corredor/new.html.twig', array(
            'corredor' => $corredor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Corredor entity.
     *
     * @Route("/{id}", name="corredor_show")
     * @Method("GET")
     */
    public function showAction(Corredor $corredor)
    {
        $deleteForm = $this->createDeleteForm($corredor);

        return $this->render('corredor/show.html.twig', array(
            'corredor' => $corredor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Corredor entity.
     *
     * @Route("/{id}/edit", name="corredor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Corredor $corredor)
    {
        $deleteForm = $this->createDeleteForm($corredor);
        $editForm = $this->createForm('AppBundle\Form\CorredorType', $corredor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($corredor);
            $em->flush();

            return $this->redirectToRoute('corredor_show', array('id' => $corredor->getId()));
        }

        return $this->render('corredor/edit.html.twig', array(
            'corredor' => $corredor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Corredor entity.
     *
     * @Route("/{id}", name="corredor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Corredor $corredor)
    {
        $form = $this->createDeleteForm($corredor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($corredor);
            $em->flush();
        }

        return $this->redirectToRoute('corredor_index');
    }

    /**
     * Creates a form to delete a Corredor entity.
     *
     * @param Corredor $corredor The Corredor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Corredor $corredor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('corredor_delete', array('id' => $corredor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    /**
     * Displays a form to edit an existing Students entity.
     *
     * @Route("/option", name="seleccion_provincia")
     * @Method({"GET", "POST"})
     */
    public function selectprovincia(Request $request)
    {

        $provincia = $request->request->get('option');
        $em = $this->getDoctrine()->getManager();

        $db = $em->getConnection();
        // $localidades=$em->getRepository('AppBundle:Localidad')->findByprovincia($provincia);

        $repository = $em->getRepository("AppBundle:Ciudad");

        $query = $repository->createQueryBuilder('p')
            ->select(array(
                    'p.id',
                    'p.nombre',

                )
            )
            ->where('p.provincia = :idprovincia')
            ->orderBy('p.nombre ', 'ASC')
            ->setParameter(':idprovincia',$provincia)
            ->setMaxResults(10000)
        ;
        $ciudad=$query->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);


//
//        $query ="SELECT id,nombre FROM ciudad WHERE provincia_id='$provincia' ORDER BY nombre ASC ";
//        $stmt = $db->prepare($query);
//        $params = array();
//        $stmt->execute($params);
//        $localidades=$stmt->fetchAll();
//
//
//        foreach ($localidades as $nombreslocalidades){
//            $result[]=$nombreslocalidades;
//
//
//
//        }



        return new JsonResponse($ciudad);


    }
}
