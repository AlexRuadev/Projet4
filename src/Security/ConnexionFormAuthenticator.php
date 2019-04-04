<?php

namespace App\Security;

use App\Repository\ParentsRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
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
        $credentials = [
            'Parents_pseudo' => $request->request->get('Parents_pseudo'),
            'Parents_mdp' => $request->request->get('Parents_mdp'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['Parents_pseudo']
        );

        return $credentials;
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $this->parentsRepository->findOneBy(['Parents_pseudo' => $credentials['Parents_pseudo']]);
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        $password = $credentials['Parents_mdp'];
        if ($password == 'iliketurtles') {
            return true;
        }
        return false;
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->router->generate('home'));
    }
    protected function getLoginUrl()
    {
        return $this->router->generate('app_login');
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('home');
    }

}
