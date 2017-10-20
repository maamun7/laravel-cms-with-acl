<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" href="{!! asset('front-assets/plugins/player/dist/skin/blue.monday/css/jplayer.blue.monday.min.css') !!}">

        <script src="{!! asset('front-assets/plugins/player/jwplayer-7.2.4/jwplayer.js') !!}"></script>

        <script>jwplayer.key="Cij69nZTFWZ/q/SkiFHoN49ifnYOxBu4LUPwqA==";</script>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">

                <div id="thePlayer"></div>
                <script type="text/javascript">
                    jwplayer('thePlayer').setup({
                        'flashplayer': 'player.swf',
                        'id': "Cij69nZTFWZ/q/SkiFHoN49ifnYOxBu4LUPwqA==",
                        'width': '800',
                        'height': '600',
                        //  autostart is false by default
                        'autostart':'false',
                        //  The Controlbar is over by default, but can be set to bottom, top, over, and none
                        'controlbar.position':'bottom',
                        //  Item(0) sets the autostart function to a particular video, 0 being the first
                        'item':'2',
                        //  Position of the playlist. Can be set to bottom, top, right, left, over or none.
                        //  If it is set to over, the playlist will appear after the videos have all been played
                        //  If it is set to bottom, the height of the player will need to be adjusted
                        'playlist.position': 'bottom',
                        'playlist.size': '300',
                        // The Position and Size are not necessary, but without them, it will just cycle through without being able to go forward or backwards
                        'playlist': [
                            @foreach($videos as $key => $val)
                            {
                                file: "{{ url('video') }}/{!! $val->video_file_name !!}"
                            },
                            @endforeach
                        ],
                        repeat: 'always'
                    });

                </script>
            </div>
        </div>
    </body>
</html>
