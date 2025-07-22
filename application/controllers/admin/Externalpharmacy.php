<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Externalpharmacy extends Admin_Controller
{
    private function fetch_items()
    {
        $url = 'https://farmacia.cemedpuertadelsol.com/api/v1/ApiItemController/itemList';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($resp, true);
        return isset($data['data']) ? $data['data'] : array();
    }

    public function categories()
    {
        $items = $this->fetch_items();
        $cats = array();
        foreach ($items as $item) {
            $cats[$item['category_id']] = $item['category_name'];
        }
        $out = array();
        foreach ($cats as $id => $name) {
            $out[] = array('id' => $id, 'name' => $name);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($out));
    }

    public function items()
    {
        $category_id = $this->input->get('category_id');
        $items = $this->fetch_items();
        $out = array();
        foreach ($items as $item) {
            if ($category_id == '' || $item['category_id'] == $category_id) {
                $out[] = array('id' => $item['id'], 'name' => $item['item_name']);
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($out));
    }
}