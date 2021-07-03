<?php


namespace Modules\Admin\Repositories\Province;


use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\ProvinceTable;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    protected $province;
    protected $timestamps = true;

    /**
     * ProvinceRepository constructor.
     * @param ProvinceTable $province
     */
    public function __construct(ProvinceTable $province)
    {
        $this->province = $province;
    }

    /**
     * @param array $filters
     * @return array|mixed
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
        if (!isset($filters['sort_province$province_id'])) {
            $filters['sort_province$province_id'] = 'desc';
        }
        if (!isset($filters['sort_province$name'])) {
            $filters['sort_province$name'] = null;
        }

        if (!isset($filters['keyword_province$name'])) {
            $filters['keyword_province$name'] = null;
        }

        $result = [
            'data' => $this->province->getListNew($filters),
            'filter' => $filters
        ];

        return $result;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {

        $data['name'] = strip_tags($data['name']);
        $data['province_code'] = strip_tags($data['province_code']);
        $data['type'] = strip_tags($data['type']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        return $this->province->add($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->province->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        // TODO: Implement edit() method.
        $data['name'] = strip_tags($data['name']);
//        $data['province_code'] = strip_tags($data['province_code']);
        $data['type'] = strip_tags($data['type']);
        $data['is_actived'] = $data['is_actived'];
        $data['updated_by'] = Auth::id();

        return $this->province->edit($data, $id);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
        return $this->province->remove($id);
    }


    /**
     * @param $id_country
     * @return array|mixed
     */
    public function getProvinceOption($id_country)
    {
        // TODO: Implement getProvinceOption() method.
        $arrProvince =  $this->province->getProvinceOption($id_country, true);
        $array = array();
        foreach ($arrProvince as $item) {
            $array[$item['province_id']] = $item['type'] . ' ' . $item['name'];
        }

        return  $array;
    }

    public function getProvinceAll()
    {
//        return $this->province->getAll();
        $arrProvince = $this->province->getAll();
        $array = array();
        foreach ($arrProvince as $item) {
            $array[$item['province_id']] = $item['type'] . ' ' . $item['name'];
        }

        return  $array;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        // TODO: Implement changeStatus() method.
        return $this->province->changeStatus($data, $id);
    }
}
