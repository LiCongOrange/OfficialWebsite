<?php

namespace plugins\guestbook;

use cmf\lib\Plugin;
use think\Db;

class GuestbookPlugin extends Plugin
{
    public $info = array(
        'name'        => 'Guestbook',
        'title'       => '留言板',
        'description' => '留言板描述',
        'status'      => 1,
        'author'      => 'duan',
        'version'     => '1.0'
    );

    public $hasAdmin = 1;//插件是否有后台管理界面


    // 插件安装
    public function install()
    {
        $dbConfig = Config('database');
        $dbSql = cmf_split_sql(PLUGINS_PATH . 'guestbook/data/guestbook.sql', $dbConfig['prefix'], $dbConfig['charset']);

        if (empty($dbConfig) || empty($dbSql)) {
            $this->error("非法安装");
        }

        $db = Db::connect($dbConfig);

        foreach ($dbSql as $key => $sql) {
                $db->execute($sql);
        }

        return true;//安装成功返回true，失败false
    }

    // 插件卸载
    public function uninstall()
    {
        $dbConfig = Config('database');
        $sql = "DROP TABLE IF EXISTS " . $dbConfig['prefix'] . "plugin_sy_guestbook";

        if (empty($dbConfig) || empty($sql)) {
            $this->error("非法安装");
        }

        $db = Db::connect($dbConfig);

        try {
            $db->execute($sql);
        } catch (\Exception $e) {
            return false;
        }

        return true;//卸载成功返回true，失败false
    }

    //    实现钩子方法
    public function guestbook($param)
    {
        $config = $this->getConfig();
        $this->assign($config);
        echo $this->fetch('widget');
    }

}