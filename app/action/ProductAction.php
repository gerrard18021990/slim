<?php

namespace action;

use helpers\FlashMessage;
use models\Product;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator;

class ProductAction
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function index(Request $request, Response $response, $args)
    {
        $this->container->view->render($response, 'product/index.php', [
            'products' => $this->container['db']->table((new Product())->getTable())->get(),
        ]);
        return $response;
    }

    public function createForm(Request $request, Response $response, $args)
    {
        $this->container->view->render($response, 'product/create.php', [
            'product' => new \models\Product(),
        ]);
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        $this->container['db']::connection();
        $product = new Product();
        if ($attributes = $request->getParam(get_class($product))) {
            if ($errors = $this->container->validator->validate($attributes, [
                'name' => Validator::noWhitespace()->notEmpty()->stringType()->length(1, 100),
                'price' => Validator::noWhitespace()->notEmpty()->intVal()->between(0, 10000),
            ])) {
                (new FlashMessage())->errors($errors);
                return $response->withRedirect('/create-product-form');
            };
            $product->fill($attributes);
            $product->save();
        }
        return $response->withRedirect('/products');
    }
}