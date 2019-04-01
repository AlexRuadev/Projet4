<?php

namespace App\Security;

use App\Repository\ParentsRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class ConnexionFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $parentsRepository;
    private $router;

    public function __construct(ParentsRepository $parentsRepository, RouterInterface $router)
    {
        $this->parentsRepository = $parentsRepository;
        $this->router = $router;
    }
    public function supports(Request $request)
    {
        // do your work when we're POSTing to the login page
        return $request->attributes->get('_route') === 'app_login'
            && $request->isMethod('POST');
    }
    public function getCredentials(Request $request)
    {
        return [
            'Parents_pseudo' => $request->request->get('Parents_pseudo'),
            'Parents_mdp' => $request->request->get('Parents_mdp'),
        ];
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $this->parentsRepository->findOneBy(['Parents_pseudo' => $credentials['Parents_pseudo']]);
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        // only needed if we need to check a password - we'll do that later!
        return true;
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->router->generate('home'));
    }
    protected function getLoginUrl()
    {

    }
}
