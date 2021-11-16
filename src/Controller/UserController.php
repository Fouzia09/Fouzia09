<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

class UserController extends AbstractController
{
    protected UserRepository $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
  
    )
    {
        $this->userRepository = $userRepository;
     
    }

     /**
     * @Route("/", name="users", methods={"GET"})
     */
    public function getAll(): Response
    {
        $users = $this->userRepository->findAll();
        if (sizeof($users) > 0){
             return $this -> json($users, 200, [], ['groups'=>['userInfos']]);
        }else {
            return $this -> json(['status'=> Response::HTTP_OK, 'message'=> 'Entity user is empty'], 200);
        }
    }

     /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    /* public function show(int $id): Response
    {
        $user = $this-> userRepository ->find($id);
        if(!$user){
            return $this-> json(['status'=> Response::HTTP_NOT_FOUND, 'message'=> 'User Not Found '] , 404, []);
        }
        return  $this->json($user, 200, [], ['groups'=>['userInfos']]);
    }*/

       /**
     * @Route("/new", name="user_new", methods={"POST"})
     */
    public function new(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator
        ): Response
{
// deserialize the json
    try {
    $user = $serializer->deserialize($request->getContent(), User::class, 'json');
    } catch (NotEncodableValueException $exception) {
    throw new HttpException(Response::HTTP_BAD_REQUEST, 'Invalid Json');
    }
    $errors = $validator->validate($user);

    if (count($errors) > 0) {
    $json = $serializer->serialize($errors, 'json', array_merge([
    'json_encode_options' => JsonResponse::DEFAULT_ENCODING_OPTIONS,
    ], []));
    return new JsonResponse($json, Response::HTTP_BAD_REQUEST, [], true);
    }

    }
}