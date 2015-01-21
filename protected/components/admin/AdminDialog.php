<?php

class AdminDialog extends CWidget
{

	public function init() {
	}

	public function run() {
		$this->renderContent();
	}

	protected function renderContent() {
		$this->render('admin_dialog');	
	}
}
