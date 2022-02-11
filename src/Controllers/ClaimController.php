<?php
	
namespace NosoProject\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use NosoProject\Model\ClaimModel;

final class ClaimController {
	protected $container;
	protected $ClaimModel;
		
	public function __construct($container){
		$this->container = $container;
		$this->ClaimModel = new ClaimModel($container);
	}
	

	public function index(Request $request, Response $response){
	    if($this->container->get('UserAuthInfo'))
		return $this->container->view->render($response, 'claim.twig', $this->ClaimModel->OptionArray());
		else
			return $response->withStatus(302)->withHeader('Location', '/auth');
		}	
	}	