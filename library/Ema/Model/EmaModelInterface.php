<?php
/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 9/3/2017
 * Time: 4:51 PM
 */

interface Ema_Model_EmaModelInterface
{
    public function getEmaDb();

    public function get($id);
    public function post($params);

    public function getCollection($params);

    public function patch($id, $data);
    public function patchCollection($idList, $data);

    public function put($id, $data);
    public function putCollection($idList, $data);

    public function delete($id);
    public function deleteCollection($idList, $dryRun=true);
}