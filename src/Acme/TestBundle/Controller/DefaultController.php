<?php

namespace Acme\TestBundle\Controller;

use Acme\TestBundle\Entity\Product;
use Acme\TestBundle\Entity\ProductKeys;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        

        $repository = $this->getDoctrine()->getRepository('AcmeTestBundle:Product');
        $products = $repository->findAll();

// создаём задачу и присваиваем ей некоторые начальные данные для примера
        $task = new Product();

        $task->setDescription(array('Write a blog post','Write a blog post','Write a blog post'));
      //  $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
           /* ->add('races', 'entity', array('label' => 'Категория',
                'class' => 'AcmeTestBundle:Test1','property' => 'id',
                    'query_builder' => function(EntityRepository $er) {
        return $er->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC');
    },'multiple' => true,"expanded" => true,'compound'=>3,
                ))*/
           /*->add('roles', 'choice', array(
    'choices' => array('Foo' => 'Foo', 'Bar' => 'Bar', 'Baz' => 'Baz'),
'empty_value' => 'Choose your gender','required'=>false,'empty_data'  => 0,"expanded" => true,'multiple' => true,
))*/
->add('categories', 'collection', array(
    'type'   => 'entity',
    'options'  => array(
               'class' => 'AcmeTestBundle:Test1','property' => 'id',
        'required'  => true,
        'attr'      => array('class' => 'email-box')
    ),
))
               
            ->add('name', 'text')
                ->add('save', 'submit') 
            ->getForm();
    
       

    $form->handleRequest($request);

    if ($form->isValid()) {
        // perform some action, such as saving the task to the database
    $em = $this->getDoctrine()->getManager();
    $em->persist($task);
    $em->flush();
    }

        return $this->render('AcmeTestBundle:Default:index.html.twig', array(
            'form' => $form->createView(),'products'=>$products
        ));
    }
}
