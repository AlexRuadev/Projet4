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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;

class ConnexionFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $parentsRepository;
    private $router;
    private $csrfTokenManager;
    private $passwordEncoder;

    public function __construct(ParentsRepository $parentsRepository, RouterInterface $router, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->parentsRepository = $parentsRepository;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
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
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['Parents_pseudo']
        );

        return $credentials;
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        return $this->parentsRepository->findOneBy(['Parents_pseudo' => $credentials['Parents_pseudo']]);
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['Parents_mdp']);
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->router->generate('profil-parent'));
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
