<?php

namespace App\Security;

use App\Repository\EntreprisesRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginEntrFormAuthenticator extends AbstractFormLoginAuthenticator
{
    private $entreprisesRepository;
    private $router;
    private $csrfTokenManager;
    private $passwordEncoder;


    public function __construct(EntreprisesRepository $entreprisesRepository, RouterInterface $router, CsrfTokenManagerInterface $csrfTokenManager, UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->entreprisesRepository = $entreprisesRepository;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
    }
    public function supports(Request $request)
    {
        // do your work when we're POSTing to the login page
        return $request->attributes->get('_route') === 'app_loginentr'
            && $request->isMethod('POST');
    }
    public function getCredentials(Request $request)
    {
        $credentials = [
            'Entreprises_pseudo' => $request->request->get('Entreprises_pseudo'),
            'Entreprises_mdp' => $request->request->get('Entreprises_mdp'),
            'csrf_token' => $request->request->get('_csrf_token'),
        ];
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['Entreprises_pseudo']
        );

        return $credentials;
    }
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {
            throw new InvalidCsrfTokenException();
        }
        return $this->entreprisesRepository->findOneBy(['Entreprises_pseudo' => $credentials['Entreprises_pseudo']]);
    }
    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['Entreprises_mdp']);
    }
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->router->generate('entreprises'));
    }
    protected function getLoginUrl()
    {
        return $this->router->generate('app_loginentr');
    }

    protected function getDefaultSuccessRedirectUrl()
    {
        return $this->router->generate('home');
    }
}
