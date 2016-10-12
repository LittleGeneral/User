<?php
/*
 * 网站首页功能模块
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        //判断是否登录
        if(!empty($_SESSION['user'])){
            $this->assign('user',$_SESSION['user']['account']);
        }else{
            $this->assign('user','open');
        }

     	$this->display();
    }
     public function layout(){
        unset($_SESSION['user']);
        $this->success("exit","index");
    }

}