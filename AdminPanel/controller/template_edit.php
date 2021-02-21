<?php
return new class(){
	public function __construct(){
        if(!core::$module['account']->checkPermission('option_editTemplate'))
			header('location: index.php?page=404');
        if(isset($_POST['createFile'])){
            $file = basename($_POST['createFile']);
            file_put_contents('../'.core::$model['template']->templateDir.$file, '');
            $_POST['file'] = $file;
            core::$model['gui']->alert('Poprawnie utworzono plik', 'success');
        }
        if(isset($_POST['fileData'])){
            $file = basename($_POST['file']);
            file_put_contents('../'.core::$model['template']->templateDir.$file, $_POST['fileData']);
            core::$model['gui']->alert('Poprawnie zapisano plik', 'success');
        }
        core::loadView('template_edit');
    }
}
?>