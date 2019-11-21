<?php

namespace plugins\guestbook\controller;
use think\Session;
use cmf\controller\PluginBaseController;
use plugins\guestbook\model\PluginSyGuestbookModel;


class IndexController extends PluginBaseController
{


    /**
     * 提交留言
     */
    public function addMsg()
    {
        // 获取post数据
        $data = $this->request->param();

        // 实例化模型

        $GuestbookModel = new PluginSyGuestbookModel();
        $GuestbookModel->allowField(true)->data($data, true)->save();
        $this->success('成功啦');
    }

}