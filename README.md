
当前插件集成了百度文本转语音功能,支持laravel 9版本以上.

下载方式:


    1、通过composer下载:composer require yreborn/laravel-speech

    2、在composer.json 新增 "yreborn/laravel-speech": "dev-main"，在命令行使用composer install进行安装


1、创建config/upload.php 配置文件

    <?php
    
    return   [
        'ali_access_key_id'     => '密钥id',
        'ali_access_key_secret' => '密钥',
        'ali_endpoint'          => '区域域名',
        'ali_bucket'            => 'bucket列表',
        'ali_http'              => '访问域名',
    
        'qn_access_key'         => '密钥id',
        'qn_secret_key'         => '密钥',
        'qn_bucket'             => 'bucket列表',
        'qn_http'               => '访问域名1',
    
        'tx_secret_id'          => '密钥id',
        'tx_secret_key'         => '密钥',
        'tx_region'             => '区域',
        'tx_bucket'             => 'bucket列表',
        'tx_http'               => '访问域名'
    ];



2、在config/app目录加载插件

        'providers' => [
            Yreborn\LaravelUpload\UploadServiceProvider::class
        ],
        'aliases' => [
            'Upload' => Yreborn\LaravelUpload\Facades\Upload::class
        ],



3、在控制器使用


        <?php
        
        namespace App\Http\Controllers;
        
        use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
        use Illuminate\Foundation\Validation\ValidatesRequests;
        use Illuminate\Http\Request;
        use Illuminate\Routing\Controller as BaseController;
        use Illuminate\Support\Facades\Storage;
        use Yreborn\LaravelUpload\Facades\Upload;
        
        class IndexController extends Controller
        {
        
            public function index(Request $request)
            {
                $oss_path = $request->file('file')->store('file');
                $local_path = Storage::path($oss_path);
                $res = Upload::aliUpload($local_path,$oss_path);
                return $res;
            }
        }

        