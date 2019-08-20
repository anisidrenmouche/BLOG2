<?php

namespace App\Controller\Admin;

use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use phpDocumentor\Reflection\DocBlock\Tags\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @Route ("/admin", name="admin.property.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', compact('properties'));

    }


    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @return \Symfony\Component\HttpFoundation\Response
     * @param Property $property
     */
    public function edit(){
       $form=  $this->createForm(PropertyType::class);
        return $this->render('admin/property/edit.html.twig',[
            'form'=> $form->createView()
        ]);
    }







}