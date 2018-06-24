<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Shop;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends Controller
{
    /**
     * @Route("/shop", name="shop")
     */
    function showAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Shop::class);
        $shops = $repository->findAll();

        return $this->render('default/shop.html.twig', [
            'shops' => $shops,
        ]);
    }

    /**
     * @Route("/shop/add", name="shop_add")
     */
    public function addShopAction()
    {
        $em = $this->getDoctrine()->getManager();
        $shop = new Shop();
        $em->persist($shop);
        $em->flush();

        return new JsonResponse(['result' => 'create']);
    }

    /**
     * @Route("/shop/{id}/del", name="party")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $shop = $em->getRepository('WoolfBundle:Post')->find($id);
        $em->remove($shop);
        $em->flush();

        return new JsonResponse(['result' => 'delete']);
    }
}