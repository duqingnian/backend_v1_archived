<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loginAction(Request $request)
    {
        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null; // The value does not come from the security component.
        }

        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;
        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }
    
    public function authAction(Request $request)
    {
        $json = array('code'=>-1,'msg'=>'网络出错');
        if($request->isMethod('post')){
			if($request->isXmlHttpRequest()) {
                $username = $request->request->get('username','');
				$password = $request->request->get('password','');
				$csrf_token = $request->request->get('_csrf_token','');
                
                $_csrf_token=$this->get('security.csrf.token_manager')->getToken('authenticate')->getValue();
                if($csrf_token != $_csrf_token){
                    $json['msg'] = "csrf_token错误";
                    return $this->json($json);
                }
                $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('username'=>$username,'ext_type'=>'CLOUD'));
                if(!$user){
                    $json['msg'] = '账号或者密码错误,错误码:501';
				}else{
                    if($user->hasRole('ROLE_SUPER_ADMIN')){
                        $encoder_service = $this->get('security.encoder_factory');
						$encoder = $encoder_service->getEncoder($user);
						if ($encoder->isPasswordValid($user->getPassword(), $password, $user->getSalt())) {
                            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
							$this->get('security.token_storage')->setToken($token);
                            
							$json['code']=0;
							$json['msg']='登录成功';
                        }else{
                            $json['msg'] = '账号或者密码错误,错误码:502';
                        }
                    }else{
                        $json['msg'] = '无权登录后台';
                    }
                }
            }else{
                $json['msg'] = "请求来源错误,错误码:68";
            }
        }else{
            $json['msg'] = "请求来源错误,错误码:71";
        }
        return $this->json($json);
    }
    protected function getIp()
	{
		if (isset($_SERVER)) {
			if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
				$realip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
			} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) { 
				$realip = $_SERVER['HTTP_CLIENT_IP']; 
			} else { 
				$realip = $_SERVER['REMOTE_ADDR']; 
			} 
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")) { 
				$realip = getenv( "HTTP_X_FORWARDED_FOR"); 
			} elseif (getenv("HTTP_CLIENT_IP")) { 
				$realip = getenv("HTTP_CLIENT_IP"); 
			} else { 
				$realip = getenv("REMOTE_ADDR"); 
			} 
		} 
		return $realip; 
	}
    protected function renderLogin(array $data)
    {
        return $this->render('FOSUserBundle:Security:login.html.twig', $data);
    }

    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall using form_login in your security firewall configuration.');
    }

    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration.');
    }
}
