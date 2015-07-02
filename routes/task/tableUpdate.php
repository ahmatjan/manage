<?php
session_start();
header("content-Type: text/html; charset=Utf-8");
$folder_name = 'manage';
//网站目录名称
include './config.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . $folder_name . '/db.php';

class progress {
	public $id;
	public $db;
	public $msg_task;
	public $msg_project;

	//构造函数
	function __construct($db, $id) {
		$this -> db = $db;
		$this -> id = $id;

		$this -> getTaskMsg();
		$this -> getProjectMsg();
	}

	public function getTaskMsg() {
		$sql = "SELECT * FROM `task_task` where id = " . $this -> id;
		$this -> msg_task = $this -> db -> get_one($sql);
	}

	public function getProjectMsg() {
		$sql_project = "SELECT * FROM `task_project` where id = " . $this -> msg_task['project_id'];
		$this -> msg_project = $this -> db -> get_one($sql_project);
	}

	//更新任务进度比例
	public function updateTaskProgress($field, $value) {
		if ($field == 'used_hour') {
			$newProgress = $value / $this -> msg_task['hour'];
		} else if ($field == 'hour') {
			if ($value == 0) {
				$newProgress = 0;
			} else {
				$newProgress = $this -> msg_task['used_hour'] / $value;
			}
		}
		if($newProgress == 0){
			$status = '未开始';
		}else if($newProgress == 1){
			$status = '已完成';
		}else{
			$status = '开发中';
		}
		//更新状态
		$this -> db -> query('update `task_task` set `status` = "' . $status . '" WHERE `id` = ' . $this -> msg_task['id']);
		//跟新进度
		$this -> db -> query('update `task_task` set `progress` = ' . $newProgress . ' WHERE `id` = ' . $this -> msg_task['id']);
	}

	//更新任务状态
	public function updateTaskStatus($field, $value) {
		if($value == 0){
			$status = '未开始';
		}else if($value == 1){
			$status = '已完成';
		}else{
			$status = '开发中';
		}
		//更新状态
		$this -> db -> query('update `task_task` set `status` = "' . $status . '" WHERE `id` = ' . $this -> msg_task['id']);
	}

	//更新项目已用人时
	public function updateTotalUsedHour($value) {
		$oldHour = $this -> msg_task['used_hour'];
		$cha = $value - $oldHour;
		$this -> db -> query('update `task_project` set `used_hour` = `used_hour`+' . $cha . ' WHERE `id` = ' . $this -> msg_project['id']);
	}

	//更新项目人时
	public function updateTotalHour($value) {
		$oldHour = $this -> msg_task['hour'];
		$cha = $value - $oldHour;
		$this -> db -> query('update `task_project` set `hour` = `hour`+' . $cha . ' WHERE `id` = ' . $this -> msg_project['id']);
	}

	//更新项目进度比例
	public function updateTotalProgress() {
		$this -> getProjectMsg();
		if ($this -> msg_project['hour'] == 0) {
			$newProgress = 0;
		} else {
			$newProgress = $this -> msg_project['used_hour'] / $this -> msg_project['hour'];
		}
		$this -> db -> query('update `task_project` set `progress` = ' . $newProgress . ' WHERE `id` = ' . $this -> msg_project['id']);
	}

	//更新项目进度比例
	public function countProgress($value) {
		$taskHour = $this -> msg_task['hour'];
		$oldProgress = $this -> msg_task['progress'];
		if ($oldProgress != $value) {
			$chaProgress = $value - $oldProgress;
			$chaHour = $taskHour * $chaProgress / 10;
			$total = $this -> msg_project['hour'];
			if ($this -> msg_project['progress'] != 0) {
				$completed = $total * $this -> msg_project['progress'] / 10;
			} else {
				$completed = 0;
			}
			$newCompleted = $completed + $chaHour;
			$newProgress = sprintf("%.2f", $newCompleted / $total);

			$data_project['progress'] = $newCompleted;
			$this -> db -> update('task_project', $data_project, 'id=' . $this -> msg_task['project_id']);
		}
	}

}

if (isset($_POST['id'])) {
	$db = new DB();
	$id = $_POST['id'];
	$updateData = new progress($db, $id);
	if ($_POST['field'] == 'used_hour') {
		$updateData -> updateTaskProgress($_POST['field'], $_POST['value']);
		$updateData -> updateTotalUsedHour($_POST['value']);
		$updateData -> updateTotalProgress();
	}
	if ($_POST['field'] == 'hour') {
		$updateData -> updateTaskProgress($_POST['field'], $_POST['value']);
		$updateData -> updateTotalHour($_POST['value']);
		$updateData -> updateTotalProgress();
	}
	if ($_POST['field'] == 'progress') {
		$updateData -> updateTaskStatus($_POST['field'], $_POST['value']);
		//$updateData -> countProgress($_POST['value']);
	}

	$data[$_POST['field']] = $_POST['value'];
	$flag = $db -> update('task_task', $data, 'id=' . $_POST['id']);
	if ($flag) {
		echo 0;
	}
}
?>
