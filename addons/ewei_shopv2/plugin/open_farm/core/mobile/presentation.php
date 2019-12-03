<?php
//淘宝店铺名：云硕科技 qq:960327091
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Presentation_EweiShopV2Page extends PluginMobilePage
{
	/**
	private $table = 'ewei_open_farm_presentation';
	/**
	private $field = array('id', 'uniacid', 'openid', 'content', 'create_time');
	/**
	private $openid = '';

	/**
	public function __construct()
	{
		parent::__construct();
		global $_W;
		$_W['openid'] = $_W['openid'];
	}

	/**
	public function addInfo($content)
	{
		global $_W;
		$data = array();
		$data['content'] = $content;
		$data['uniacid'] = $_W['uniacid'];
		$data['openid'] = $_W['openid'];
		$data['create_time'] = date('Y-m-d H:i:s');
		$presentationInfo = pdo_insert($this->table, $data);
		return $presentationInfo;
	}

	/**
	public function getList()
	{
		global $_W;
		global $_GPC;
		$currentPage = intval($_GPC['__input']['page']);
		$currentPage = $currentPage ? $currentPage : 1;
		$pageSize = 10;
		$filed = ' `content`,`create_time` ';
		$sql = 'SELECT ' . $filed . ' FROM ' . tablename($this->table);
		$sql .= ' WHERE `uniacid` = \'' . $_W['uniacid'] . '\' AND `openid` = \'' . $_W['openid'] . '\' ';
		$sql .= ' ORDER BY `id` DESC ';
		$sql .= ' LIMIT ' . ($currentPage - 1) * $pageSize . ',' . $pageSize;
		$list = pdo_fetchall($sql);
		$this->model->returnJson($list);
	}
}

?>