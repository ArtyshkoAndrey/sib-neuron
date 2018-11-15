<?php

namespace App\Http\Middleware;

use Closure;

class BreadCrumbs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = $this->deleteGET($url);
        $urls = explode('/', $url);

        //Хлебные крошки
        $crumbs = array();

        //На главной не показываем
        if (!empty($urls) && $url != '/')
        {
            foreach ($urls as $key => $value)
            {
                //Собираем url для каждого пункта цепочки
                $prev_urls = array();
                for ($i = 0; $i <= $key; $i++)
                {
                    $prev_urls[] = $urls[$i];
                }

                //собираем url для всех, кроме текущей страницы
                if ($key == count($urls)-1) $crumbs[$key]['url'] = '';
                elseif (!empty($prev_urls)) $crumbs[$key]['url'] = count($prev_urls) > 1 ? implode('/', $prev_urls) : '/';

                //Прописываем название пункта, исходя из url
                switch ($value)
                {
                    case 'user' :
                        $crumbs[$key]['text'] = 'Пользователь';
                        break;
                    case 'edit' :
                        $crumbs[$key]['text'] = 'Редактировать';
                        break;
                    case 'new' :
                        $crumbs[$key]['text'] = 'Создать';
                        break;
                    case 'albums' :
                        $crumbs[$key]['text'] = 'Альбомы';
                        break;
                    case 'new-video' :
                        $crumbs[$key]['text'] = 'Создать видео';
                        break;
                    case 'photo' :
                        $crumbs[$key]['text'] = 'Фото';
                        $crumbs[$key]['url'] = null;
                        break;
                    case 'vk' :
                        $crumbs[$key]['text'] = 'Вконтакте';
                        break;
                    default :
                        $crumbs[$key]['text'] = 'Главная';
                        break;
                }

                if ($key > 0) $crumbs[$key]['text'] = $crumbs[$key]['text'];
            }
        }

        $request->attributes->Add(['breadcrumbs' => $crumbs]);

        return $next($request);
    }

    public function deleteGET($url, $amp = false) {
      $url = str_replace("&amp;", "&", $url); // Заменяем сущности на амперсанд, если требуется
      list($url_part, $qs_part) = array_pad(explode("?", $url), 2, ""); // Разбиваем URL на 2 части: до знака ? и после
      return $url_part; // Возвращаем итоговый URL
    }
}
