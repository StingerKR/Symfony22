<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductsController.php',
        ]);
    }
	
    public function show(int $id): Response
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());	
	}		
	
	public function showAll(): Response
    {
        $products = $this->getDoctrine()->getManager()->getRepository(Product::class)->showAllProducts();
		$out = "";
		
		for($i = 0; $i < count($products); $i++) {
			$out =$out. $products[$i]->getName()."<br>";
		}
		
		return new Response($out);
	}	
	
	public function showCat(): Response
	{
        $products = $this->getDoctrine()->getManager()->getRepository(Product::class)->showCat();
		$out = "";
		
		for($i = 0; $i < count($products); $i++) {
			$out =$out. $products[$i]->getName()."<br>";
		}
		
		return $this->render('cat.html.twig');
		//return new Response($out);		
	}
}