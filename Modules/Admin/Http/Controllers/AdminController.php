<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\BrandTable;
use App\Models\CampaignTable;
use App\Models\CampCusTable;
use App\Models\PhoneServiceTable;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;

class AdminController extends Controller
{
    public $provinceRepo;
    protected $sms;
    protected $cc;
    
    public function __construct(ProvinceRepositoryInterface $provinceRepo, CampaignTable $sms, CampCusTable $cc)
    {
        $this->provinceRepo = $provinceRepo;
        $this->sms=$sms;
        $this->cc=$cc;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->provinceRepo->list($filter);
        return view('admin::admin.index', [
            'list' => $data['data'],
            'filter' => $data['filter']
        ]);
    }

    public function singleSMSAction()
    {
        $brandData = app(BrandTable::class);
        $brandInfo = $brandData->getBrand();

        return view ('admin::config-single-sms',['brandInfo' => $brandInfo]);
    }

    public function singleSMSStoreAction(Request $request)
    {
        $sms = $request->except('_token');
        $request->validate([
            'brand_id'=>'required',
            'phone'=>'required|digits:10',
            'content'=>'required|max:160',
            'send_type'=>'required'
        ]);

        $sms['created_by'] = 3;
        $sms['type'] = 'single';
        $sms['status'] = 'new';
        $sms['is_active'] = 1;

        $sms['send_at'] = $this->sendAt($sms['send_type'], $sms['year'], $sms['month'], $sms['day'], $sms['hour'], $sms['min']);

        try {

            $cpid = $this->sms->storeSms($sms);

            $cc['campaign_id']=$cpid;
            $cc['phone'] = $sms['phone'];

            $num = substr($sms['phone'],0,3);

            $telData = app(PhoneServiceTable::class);
            $telInfo = $telData->getTel($num);

            $cc['telco'] = $telInfo['telco'];
            $cc['status'] = $sms['status'];
            $cc['created_by'] = $sms['created_by'];
            $cc['send_at'] = $sms['send_at'];

            $this->cc->storeSms($cc);

        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
        return "Message sent!";
    }

    public function sendAt($sendtype,$year,$month,$day,$hour,$min)
    {
        if($sendtype == 'now')
        {
            return Carbon::now()->format('Y-m-d H:i:00');
        }
        else 
        {
            return $year.'-'.$month.'-'.$day.'-'.$hour.':'.$min.':00';
        }
    }



    
}
