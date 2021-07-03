<?php
namespace MyCore\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * Created by PhpStorm.
 * User: daidp
 * Date: 11/15/2018
 * Time: 11:08 AM
 */
abstract class ApiAbstract
{
    protected $baseUrlApi = BASE_URL_API;
    protected $baseUrlMyStoreQueue = MY_STORE_QUEUE;
    protected $baseSamplingAlias;
    protected $baseSamplingApi;

    public function __construct()
    {
        $this->baseSamplingApi = env('SAMPLING_API_URL');
        $this->baseSamplingAlias = env('SAMPLING_API_URL_ALIAS');
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        $client = new Client([
            'base_uri' => $this->baseUrlApi,
            'headers' => [
                'Authorization' => 'Bearer '.env('TOKEN_API_BACKOFFICE'),
            ],
            'verify' => false
        ]);

        return $client;
    }

    /**
     * @return Client
     */
    protected function getClientMyStoreQueue()
    {
        $client = new Client([
            'base_uri' => PUSH_NOTIFICATION_URL_API,
            'verify' => false
        ]);

        return $client;
    }

    /**
     * @return Client
     */
    protected function getClientBrandPortal()
    {
        $client = new Client([
            'base_uri' => asset('/'),
            'headers' => [
                'Authorization' => 'Bearer '.env('TOKEN_API_BACKOFFICE'),
            ],
            'verify' => false
        ]);
        return $client;
    }

    /**
     * Hàm cơ bản xử lý gọi api và trã kết quả
     * @param $url
     * @param $params
     * @return mixed
     * @throws ApiException
     */
    protected function baseClient($url, $params, $stripTags = true)
    {
        try
        {
            if ($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClient();

            $rsp = $oClient->post($url, [
                'json' => $params,
            ]);

            return json_decode($rsp->getBody(), true);
        }
        catch (\Exception $ex)
        {
            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    protected function baseClientMyStoreQueue($url, $params, $stripTags = true)
    {
        try
        {
            if ($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClientMyStoreQueue();
            $rsp = $oClient->post($url, [
                'json' => $params,
            ]);
            $result = json_decode($rsp->getBody(), true);
            if (($result['ErrorCode'] ?? 1) == 0) {
                return $result['Data'];
            } else {
                return $result;
            }
        }
        catch (\Exception $ex)
        {
            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    protected function baseClientBrandPortal($url, $params, $stripTags = true)
    {
        try
        {
            if ($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClientBrandPortal();
            $rsp = $oClient->post($url, [
                'json' => $params,
            ]);
            $result = json_decode($rsp->getBody(), true);
            if (($result['ErrorCode'] ?? 1) == 0) {
                return $result['Data'];
            } else {
                return $result;
            }
        }
        catch (\Exception $ex)
        {
            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    /**
     * @return Client
     */
    protected function getClientSampling()
    {
        $client = new Client([
            'base_uri' => $this->baseSamplingApi,
            'headers' => [
                'Authorization' => 'Bearer '.env('TOKEN_API_BACKOFFICE'),
            ],
            'verify' => false
        ]);

        return $client;
    }

    /**
     * Hàm cơ bản xử lý gọi api và trã kết quả
     * @param $url
     * @param $params
     * @return mixed
     * @throws ApiException
     */
    protected function baseClientSampling($url, $params, $stripTags = true)
    {
        try
        {
            if($this->baseSamplingAlias){
                $url = $this->baseSamplingAlias.'/'.$url;
            }

            if ($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClientSampling();

            $rsp = $oClient->post($url, [
                'json' => $params
            ]);

            $result = json_decode($rsp->getBody(), true);

            if (($result['ErrorCode'] ?? 1) == 0) {
                return $result['Data'];
            } else {
                return $result;
            }
        }
        catch (\Exception $ex)
        {
            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    protected function baseClientUpload($url, $params)
    {
        try
        {
            $oClient = $this->getClient();
            $rsp = $oClient->post($url, [
                'multipart' => [$params]
            ]);

            $token = $rsp->getHeader('AUTH_TOKEN');
            if (! empty($token)) {
                session(['authen_token' => str_replace('Bearer ', '', current($token))]);
// \MasterConstant::createSSO(str_replace('Bearer ', '', current($token)));
            }
            return json_decode($rsp->getBody(), true);
        }
        catch (\Exception $ex)
        {

            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    protected function getClientPushNotification()
    {
        $client = new Client([
            'base_uri' => PUSH_NOTIFICATION_URL_API,
            'http_errors' => false, // Do not throw GuzzleHttp exception when status error
            'verify' => false
        ]);

        return $client;
    }

    protected function baseClientPushNotification($url, $params, $stripTags = true)
    {
        try
        {
            if($stripTags) $params = $this->stripTagData($params);

            $oClient = $this->getClientPushNotification();

            $rsp = $oClient->post($url, [
                'json' => $params,
            ]);

            return json_decode($rsp->getBody(), true);
        }
        catch (\Exception $ex)
        {

            Log::error('PIO ERR | Connection Error By Api: '.$url);
            Log::error('PIO ERR | Connection Content: '.$ex->getMessage());
            throw new ApiException('Đã có lỗi, vui lòng thử lại sau');
        }
    }

    /**
     * hỗ trợ striptag data
     * @param $arrData
     * @return array
     */
    protected function stripTagData($arrData)
    {
        $arrResult = [];
        foreach ($arrData as $key => $item)
        {
            $arrResult[$key] = strip_tags($item);
        }

        return $arrResult;
    }

}
