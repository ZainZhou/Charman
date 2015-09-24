<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller {

    public function index() {
        $school = M('school')->select();
        $this->assign('school', $school);
        $this->display();
    }

    public function getData() {
        $data = I('post.');
        $setting=C('UPLOAD_SITEIMG_QINIU');
        $Upload = new \Think\Upload($setting);
        $info = $Upload->upload();
        $data['pic'] = $info['pic']['url'].'-tinyq30';
        M('president')->add($data);
        $this->success('ok');
    }
}