<?php
declare(strict_types=1);

namespace App\Controller\Api\Auth;


use App\Model\User\Entity\User\Email;
use App\Model\User\Entity\User\Name;
use App\Model\User\Entity\User\UserRepository;
use App\Model\User\UseCase\SignUp\Request\Command;
use App\Model\User\UseCase\SignUp\Request\Handler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class SignUpController extends AbstractController
{
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    #[Route ('/s/{email}', name: 'auth', methods: ['GET'])]
    public function getUserByEmail(string $email, UserRepository $user): Response
    {

        $user = $use->getByEmail(new Email($email));
        $user->changeName(new Name("muslim", "magomaev"));
        return $this->json(['cc' => $user], 201);
    }

    #[Route ('/auth/signup', name: 'auth.signup', methods: ['POST'])]
    /**
     * @param Request $request
     * @param Handler $handler
     * @return Response
     */
    public function request(Request $request, Handler $handler): Response
    {
        /** @var Command $command */
        $command = $this->serializer->deserialize($request->getContent(), Command::class, 'json');

        $violations = $this->validator->validate($command);
        if (\count($violations)) {
            $json = $this->serializer->serialize($violations, 'json');
            return new JsonResponse($json, 400, [], true);
        }

        $handler->handle($command);

        return $this->json([], 201);
    }
}