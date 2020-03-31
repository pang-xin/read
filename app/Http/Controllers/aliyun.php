<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;

class aliyun extends Controller
{
    public function code(Request $request)
    {
        $tel = $request->input('tel');
        $num = rand(10000,99999);
        $code = ['code'=>"$num"];
        $code = json_encode($code);
        // Download：https://github.com/aliyun/openapi-sdk-php
        // Usage：https://github.com/aliyun/openapi-sdk-php/blob/master/README.md

        AlibabaCloud::accessKeyClient('LTAI2mo0M0h8y3uP', 'pJGczANaDHTRYg7DA5QQ4PKp3MNUpu')
            ->regionId('cn-hangzhou')
            ->asDefaultClient();

        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => "$tel",
                        'SignName' => "CTR篮球",
                        'TemplateCode' => "SMS_172885290",
                        'TemplateParam' => "$code",
                    ],
                ])
                ->request();
            print_r($result->toArray());
        } catch (ClientException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }

        session(['code'=>$num]);
    }

    protected $config = [
        'app_id' => '2016101400681519',//你创建应用的APPID
        'notify_url' => 'http://1905read.lijiaxin.xyz/read/index',//异步回调地址
        'return_url' => 'http://1905read.lijiaxin.xyz/read/index',//同步回调地址
        'ali_public_key' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB',//是支付宝公钥，不是应用公钥,  公钥要写成一行,不要换行
        // 加密方式： **RSA2**
        //密钥,密钥要写成一行,不要换行
        'private_key' => 'MIIEogIBAAKCAQEAkmJn5zzKQTy5Dynq+IQtaZ62rdkyoKYbf5ftOlp/54jaRwgpRQn1zeKsV+hCWmtlGptSYdWUnrqLK4NTd1SgZh0Crdk/aDbEct0NG1XgNBPDvxH5zgfWH6jWB3zHUpgNCPGCgUlsLEz107bO4A9zJuUn6aSwyihwVLWcLy7qRO7ptCZEwebk3MD4ywuRbE4oxgvWo1Neab/oi3jZgrv1iCJGBGgvInOhv2VH9jyQ5qIbXGJ6lKFqQGRqjLbsYb7cdNq/VTpw94fBU6BlpTDsWS24EwSrmFWc2NXCVC5sqqm5JLs+8shXCbTxeRN1aTO0sJBVPzLZU+Pw0pMNkdajXwIDAQABAoIBAGaacxmxklKHrW7jgr8OZoZRqNnSE5pm039rjewI4v32/ogrQEIT6SaWaxZyxY97FzK/C89nVPSs7D9jnW1W89afHvGcBMWXHbslFbrDRpM6B0o131J6S6uFO/+jhlJuITTTkxXr0NZ8WxI6YGbMbXolxQQPW5tXHOVDJmYsDCij/eljvmQyasj256do05WS9m5bKvvYZI9hIjSbyrpmLX5IdAx9gO2+NhNB+cHAD9xqck5RjeiN9elKUab/D2Ea7DjZduXbREVtpXfeSNYjgfanBU8Bl4COmapPi5ci48OAUH++gu3Mzm7wcp41xNxw7xI4dskjv0fRsCWN9ln6kAECgYEAwvFz7+m+5BLfY9kMTGBv4Lafbz4Jav0ttZjMA4KuTsp21C9wVjLTk5SMLviNDR4RylaE/NSnmaIPiES8r/0q48b0psz+3KrC3IfY0FYUme/84wYfH7Kkwah2XMmSGrJ1keV7ThIn2T/UxYM5jplu39g4rXk1aHLEIenw3U37sIECgYEAwDuCZ7QgyUNRZPuJD7urkUJrGn6BJLDApX8JN5qqL3/BGXB3umDImvRpNYD5g82WvmH0KSmpkptMcPEf1D6JBMj5W4AyEjNYfpRL52hdjCKFHjksqng/jnSI06BJbD0EsaJ/rkoz6ALFUthKPE+aUtI8rTQkcwtLi4v/v4NWY98CgYBz9bzJUXnDoZZQhqPSKuth+EAOpBBmHAQ8qY9x5yJYrAbTYQSpwcIpX4ujxSXiT6i1e5HP849ezBABNyImbao9o/OT5Q0Vpl4TYJuQEiRfDWqYgOOyr0liCRufRigqyU02ZBNc9V/O0zF17AEo2gwiCzRrvFYQs3QH2Gj2u5SkAQKBgHfDG4V8ZYi+VfFx/Hw+0a7YEF4bPl4beIoi0R1BUJHzJ9yvgwgs0A4qA3n/9nO1HBtUb4dNm4XpFwCuWMQkibzfcOsevRM1xgZmYbuz+8QYpZKk0D0MWZxo4e3myJeUlF4O/TkapagAQetRMT7N4TmEHaVS/PpnqRMxj45DRwlFAoGAPq2bPcpx+9mxs4t9g9XJhPCnoVS/pXb2vAtoqlqmGDm0hp99+8gP9w51N9XN+gfT35mIGT/5S8ne3asyptzulFcnehPyoNeBPLh6FHU3KVz7qMqQMnnmmuOStxP1tQwPwhiyT+GGjb/14aQ4PsuOtOXiNUvGfHcmT2O7QfxgUnM=',
        'log' => [ // optional
            'file' => './logs/alipay.log',
            'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
            'type' => 'single', // optional, 可选 daily.
            'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
        ],
        'http' => [ // optional
            'timeout' => 5.0,
            'connect_timeout' => 5.0,
            // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
        ],
        'mode' => 'dev', // optional,设置此参数，将进入沙箱模式
    ];
    public function alipay()
    {
        $month_ticket = $_GET['month_ticket'];
        $order = [
            'out_trade_no' => time(),
            'total_amount' => "$month_ticket",
            'subject' => '月票',
        ];

        $alipay = Pay::alipay($this->config)->web($order);

        return $alipay;
    }

    public function AliPayReturn()
    {
        $data = Pay::alipay($this->config)->verify(); // 是的，验签就这么简单！

        // 订单号：$data->out_trade_no
        // 支付宝交易号：$data->trade_no
        // 订单总金额：$data->total_amount
    }

    public function AliPayNotify()
    {
        $alipay = Pay::alipay($this->config);

        try{
            $data = $alipay->verify(); // 是的，验签就这么简单！

            // 请自行对 trade_status 进行判断及其它逻辑进行判断，在支付宝的业务通知中，只有交易通知状态为 TRADE_SUCCESS 或 TRADE_FINISHED 时，支付宝才会认定为买家付款成功。
            // 1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号；
            // 2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额）；
            // 3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）；
            // 4、验证app_id是否为该商户本身。
            // 5、其它业务逻辑情况

            Log::debug('Alipay notify', $data->all());
        } catch (\Exception $e) {
            //$e->getMessage();
        }

        return $alipay->success();
    }
}
