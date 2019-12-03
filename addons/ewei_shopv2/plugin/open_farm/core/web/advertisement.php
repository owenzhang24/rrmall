<?php
//淘宝店铺名：云硕科技 qq:960327091
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Advertisement_EweiShopV2Page extends PluginWebPage
{
	/**
	private $table = 'ewei_open_farm_advertisement';
	/**
	private $field = array('id', 'uniacid', 'name', 'logo', 'url', 'create_time');
	/**
	private $message = array('name' => '请填写按钮名字', 'logo' => '请上传按钮图标', 'url' => '请填写跳转链接');

	/**
	public function __construct($_init = true)
	{
		parent::__construct($_init);
	}

	/**
	public function addInfo()
	{
		global $_W;
		global $_GPC;
		$data = $_GPC['__input'];
		$where = array('id' => $data['id']);
		$data['uniacid'] = $_W['uniacid'];
		$this->checkInfo($data);
		$data = $this->model->removeUselessField($data, $this->field);

		if ($data['id']) {
			$noticeInfo = pdo_update($this->table, $data, $where);
		}
		else {
			$noticeInfo = pdo_insert($this->table, $data);
		}

		$this->model->returnJson($noticeInfo);
	}

	/**
	public function main()
	{
		require_once $this->template();
	}

	/**
	public function getInfo()
	{
		global $_W;
		global $_GPC;
		$id = $_GPC['__input']['id'];
		$configInfo = pdo_get($this->table, array('id' => $id));
		$configInfo['show_logo'] = tomedia($configInfo['logo']);
		$this->model->returnJson($configInfo);
	}

	/**
	public function getList()
	{
		global $_W;
		global $_GPC;
		$condition = array('uniacid' => $_W['uniacid']);

		try {
			$sql = 'SELECT * FROM ' . tablename($this->table) . 'WHERE `uniacid`=' . $_W['uniacid'];
			$sql .= ' ORDER BY id DESC ';
			$advertisementList = pdo_fetchall($sql, $condition);
			$advertisementList = $this->model->forTomedia($advertisementList, 'logo', 'show_logo');
			$this->model->returnJson($advertisementList);
		}
		catch (Exception $e) {
			$this->model->errorMessage($_W['isajax'], $e->getMessage());
		}
	}

	/**
	public function deleteInfo()
	{
		global $_W;
		global $_GPC;
		$id = $_GPC['__input']['id'];
		$query = pdo_delete($this->table, array('id' => $id));
		$this->model->returnJson($query);
	}

	/**
	private function checkInfo($data)
	{
		$this->model->checkDataRequired($data, $this->message);
	}
}

?>