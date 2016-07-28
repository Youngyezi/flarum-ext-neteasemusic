<?php 
namespace Flarum\MediaembedCn;

use Flarum\Event\ConfigureFormatter;
use Illuminate\Events\Dispatcher;

function subscribe(Dispatcher $events)
{
    $events->listen(
        ConfigureFormatter::class,
        function (ConfigureFormatter $event)
        {
            $event->configurator->MediaEmbed->add(
                'music163',
                [
                    'host'    => 'music.163.com',
                    'extract' => "!music\\.163\\.com/#/song\\?id=(?'id'\\d+)!",
                    'iframe'  => [
                        'width'  => 330,
                        'height' => 86,
                        'src'    => 'http://music.163.com/outchain/player?type=2&id={@id}&auto=0&height=66'
                    ]
                ]
            );
        }
    );
};

return __NAMESPACE__ . '\\subscribe';