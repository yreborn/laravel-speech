
当前插件集成了百度文本转语音功能,支持laravel 9版本以上.

下载方式:


    1、通过composer下载:composer require yreborn/laravel-speech

    2、在composer.json 新增 "yreborn/laravel-speech": "dev-main"，在命令行使用composer install进行安装


1、创建config/speech.php 配置文件

   <?php

    return   [
        'API_KEY'    => '',
        'SECRET_KEY' => '',
    ];



2、在config/app目录加载插件

        'providers' => [
            Yreborn\LaravelSpeech\SpeechServiceProvider::class
        ],
        'aliases' => [
            'Speech' => Yreborn\LaravelSpeech\Facades\Speech::class
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
                //tex:文本  cuid:唯一标识 lang:中文 task_ids:任务id
                $short = ['tex' => '现在的时间是20231013','cuid' => '2iQCcRhICQ2KUeAS46oK31EJNkau52Oz'];
                $long = ['text' => '现在的时间是20231013','lang' => 'zh'];
                $query = ['task_ids' => ['6528a1e31134240001d39fff']];
                $data = Speech::query($query); //长文本查询
                $data = Speech::short($short); //短文本生成
                $data = Speech::long($long); //长文本生成
                if(!is_array($data)){
                    file_put_contents('audio.mp3', $data);
                    return view('video', ['view' => 'audio.mp3']);
                }
            }
        }



4、html页面播放
        
    ```php
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,minimal-ui">
        <meta name="referrer" content="no-referrer">
        <title>xgplayer</title>
        <style type="text/css">
            html, body {width:100%;height:100%;margin:auto;overflow: hidden;}
        </style>
    </head>
    <body>
    <div id="mse"></div>
    <link rel="stylesheet" href="https://unpkg.byted-static.com/xgplayer/3.0.1/dist/index.min.css"/>
    <script charset="utf-8" src="https://unpkg.byted-static.com/xgplayer/3.0.1/dist/index.min.js"></script>
    
    <script>
        const config = {
            "id": "mse",
            "url": "{{asset($view)}}",
            "playsinline": true,
            "poster": "//lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/byted-player-videos/1.0.0/poster.jpg",
            "plugins": []
        }
    
        let player = new Player(config)
    
    </script>  </body>
    </html>
        ```

        