<?php


namespace Modules\Admin\Repositories\Province;


interface ProvinceRepositoryInterface
{
    /**
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = []);

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function remove($id);


    /**
     * @param $id_country
     * @return mixed
     */
    public function getProvinceOption($id_country);

    /**
     * Lấy tất cả province
     * @return mixed
     */
    public function getProvinceAll();

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id);
}