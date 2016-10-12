<?php
/*
 * 登录 注册 验证码 邮箱验证
 */
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller {

    // 注册邮箱
    public function register() {
        $this->display();
    }

    //生成验证码
    public function verify_c() {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 40;
        $Verify->expire = 600;
        $Verify->entry();
    }

    //验证码刷新 验证
    public function verify_y() {
        $verify = new \Think\Verify();
        if ($verify->check(I('post.verifyname'), '')) {
            $msg = 200;
        } else {
            $msg = 400;
        }
        $this->ajaxReturn($msg);
    }

    //邮箱发送验证码 调用think_send_mail()方法 先在libray/org/vator加载PHPMAIL 再common下function中,
    public function add() {
        $where['email'] = I('post.email');
        $user = D('user')->where($where)->find();
        $reg = '/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/';
        if ($user > 0) {
            $msg = 300; //邮箱已经存在
        } elseif (!preg_match($reg, I('post.email'))) {
            $msg = 500; //邮箱格式错误
        } else {
            $content = '';
            for ($i = 0; $i < 4; $i++) {
                $content .= rand(0, 9);
            }
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['emaily'] = $content;
            $_SESSION['etime'] = time();
            if (think_send_mail($_POST['email'], "email", $subject = '注册验证码', $content, $attachment = null)) {
                $msg = 400;
            } else {
                $msg = 200;
            }
        }
        $this->ajaxReturn($msg);
    }

    // 注册邮箱验证
    public function reg() {
        $this->display("register2");
    }

    //验证邮箱验证码,两次密码
    public function dopass() {
        $nTime = time();
        $shorttime = $nTime - I('session.etime');
        if ($shorttime > 60 * 60) {
            $_SESSION['etime'] = null;
            $msg = 400; //超时返回值
        } elseif (I('session.emaily') != I('post.email')) {
            $msg = 200; //邮箱验证码是否正确
        }
        $this->ajaxReturn($msg);
    }

    //注册成功添加数据库进入首页
    public function loginR() {
        $data['passwd'] = md5(I('post.passwd'));
        $data['email'] = I('session.email');
        $data['account'] = time();
        $data['state'] = 1;
        $data['loginip'] = get_client_ip();
        $data['logintime'] = time();
        $data['addtime'] = time();
        $user = D("user");
        $res = $user->add($data);
        if ($res) {
            $msg = 400;
            $da = M('user')->where("account='{$data['account']}'")->find();
            $_SESSION['user']['id'] = $da['id'];
            $_SESSION['user']['email'] = $da['email'];
            $_SESSION['user']['account'] = $da['account'];
            $_SESSION['user']['sid'] = session_id();
        }
        $this->ajaxReturn($msg);
    }
    //登陆
    public function login() {
        $this->display();
    }
    //登陆验证
    public function dologin() {
        $user = D('user');
        if (!$user->create()) {
            $this->error($user->getError());
        } else {
            $email = I('post.email');
            $account = I('post.email');
            // $map['passwd'] = $_POST['passwd'];
            $map['passwd'] = md5($_POST['passwd']);
            $map['state'] = 1;
            $map['_string'] = "email='{$email} 'or account='{$account}'";
            $data = $user->where($map)->find();
            if ($data > 0) {
                $msg = 400;
                if ($data['sid']) {
                    $_SESSION['user']['sid'] = $data['sid'];
                } else {
                    $_SESSION['user']['sid'] = session_id();
                }
                $_SESSION['user']['id'] = $data['id'];
                $_SESSION['user']['email'] = $data['email'];
                $_SESSION['user']['account'] = $data['account'];
                $id = $data['id'];
                $ad['sid'] = $_SESSION['user']['sid'];
                $ad['loginip'] = get_client_ip();
                $ad['logintime'] = time();
                $res = D('user')->where("id='{$id}'")->data($ad)->save();
            } else {
                $msg = 200;
            }
        }
        $this->ajaxReturn($msg);
    }

}
