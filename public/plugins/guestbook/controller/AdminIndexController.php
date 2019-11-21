<?php

namespace plugins\guestbook\controller; //Demo插件英文名，改成你的插件英文就行了

use cmf\controller\PluginBaseController;
use plugins\guestbook\model\PluginSyGuestbookModel;

class AdminIndexController extends PluginBaseController
{
    //初始化，检测是否可以管理
    function _initialize()
    {
        $adminId = cmf_get_current_admin_id();//获取后台管理员id，可判断是否登录
        if (!empty($adminId)) {
            $this->assign("admin_id", $adminId);
        } else {
            header('HTTP/1.1 404 Not Found');
            header('Status:404 Not Found');
            $this->error('非法登录！！');
        }
    }

    //留言列表
    function index()
    {
        $guestbookModel = new PluginSyGuestbookModel();
        $guestbook = $guestbookModel->order("id DESC")->paginate(20);
        // 获取分页显示
        $page = $guestbook->render();
        $this->assign("guestbook", $guestbook);
        $this->assign("page", $page);
        return $this->fetch('/admin_index');
    }

    //查看留言详细信息
    function detail()
    {
        $id = $this->request->param('id', 0, 'intval');
        $guestbookModel = new PluginSyGuestbookModel();
        $detail = $guestbookModel->where(["id" => $id])->find();
        $isread['isread']=2;
        $guestbookModel->where(["id" => $id])->update($isread);
        $this->assign("detail", $detail);
        return $this->fetch('/admin_detail');
    }

    //删除留言
    function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        $guestbookModel = new PluginSyGuestbookModel();
        $guestbookModel::destroy(['id' => $id]);
        $this->success('删除成功！');
    }
}