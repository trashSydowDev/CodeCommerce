<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Product;
use CodeCommerce\Repositories\AdminProductsRepository;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests\CartRequest;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;

    private $productsRepository;

    public function __construct(Cart $cart, AdminProductsRepository $productsRepository)
    {
        $this->cart = $cart;
        $this->productsRepository = $productsRepository;
    }


    public function index(Session $session)
    {
        if (!$session::has('cart')) {
            $session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => $session::get('cart')]);
    }

    public function add($id, Session $session)
    {
        $cart = $this->getCart($session);

        $product = $this->productsRepository->find($id);

        $cart->add($id, $product->name, $product->price);

        $session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function destroy($id, Session $session)
    {
        $cart = $this->getCart($session);

        $cart->remove($id);

        $session::set('cart', $cart);

        return redirect()->route('cart');
    }


    public function update(CartRequest $request, $id, Session $session)
    {
        $data = $request->all();

        $cart = $this->getCart($session);

        $product = $this->productsRepository->find($id);

        $cart->update($id, $product->name, $product->price, $data['qtd']);

        if ($data['qtd'] == 0) {
            $cart->remove($id);
        }

        $session::set('cart', $cart);

        return redirect()->route('cart');
    }

    private function getCart(Session $session)
    {
        if ($session::has('cart')) {
            $cart = $session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }
}
