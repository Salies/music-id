<!DOCTYPE html>
<html lang="en">
<head>
    <title>Music ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <header>Salies Music ID</header>
        <div class="titling">
            <img src="img/avatar.png" class="avatar">
            <div class="name">Salies</div>
            <div class="l_box">
                <section class="level"></section>
                <section class="badges">
                    <div class="badge one"></div>
                    <div class="badge one"></div>
                    <div class="badge one"></div>
                    <img src="img/arrow.png" class="arrow">
                </section>
            </div>
        </div>

        <div class="divider band">
            <span class="title">Top Artists</span>
            <div class="top">
                <div class="item"><div class="artist_pic" style="background-image:url(img/bg.png)"></div><span class="artist_name">Blind Guardian</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/a7x.png)"></div><span class="artist_name">Avenged Sevenfold</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/dt.png)"></div><span class="artist_name">Dream Theater</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/arjen.png)"></div><span class="artist_name">Arjen A. Lucassen</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/neal.png)"></div><span class="artist_name">Neal Morse</span></div>
            </div> 
        </div>

        <div class="divider band">
            <span class="title">Top Albums</span>
            <div class="top">
                <div class="item"><div class="artist_pic" style="background-image:url(img/mare.png)"></div><span class="artist_name">Nightmare</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/metropolis.png);margin-bottom:2px;"></div><span class="artist_name" style="font-size:14px;">Metropolis Pt. 2: Scenes From A Memory</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/mc.png)"></div><span class="artist_name" style="font-size:16px">Operation: Mindcrime</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/ay.png)"></div><span class="artist_name" style="font-size:16px">The Human Equation</span></div>
                <div class="item"><div class="artist_pic" style="background-image:url(img/whirl.jpg)"></div><span class="artist_name">The Whirlwind</span></div>
            </div> 
        </div>
   
        <div class="divider band">
            <span class="title"><img src="img/last.png">Most Listened Artists</span>
            <div class="top">
                <div class="item"><div class="artist_pic last_fm_artist_0"></div><span class="artist_name last_fm_artist_0">Nightmare</span></div>
                <div class="item"><div class="artist_pic last_fm_artist_1"></div><span class="artist_name last_fm_artist_1">Metropolis Pt. 2: Scenes From A Memory</span></div>
                <div class="item"><div class="artist_pic last_fm_artist_2"></div><span class="artist_name last_fm_artist_2">Operation: Mindcrime</span></div>
                <div class="item"><div class="artist_pic last_fm_artist_3"></div><span class="artist_name last_fm_artist_3">The Human Equation</span></div>
                <div class="item"><div class="artist_pic last_fm_artist_4"></div><span class="artist_name last_fm_artist_4">The Whirlwind</span></div>
            </div> 
        </div>      

        <div class="divider band">
            <span class="title"><img src="img/last.png">Most Listened Albums</span>
            <div class="top">
                <div class="item"><div class="artist_pic last_fm_album_0"></div><span class="artist_name last_fm_album_0" style="font-size:16px"></span></div>
                <div class="item"><div class="artist_pic last_fm_album_1"></div><span class="artist_name last_fm_album_1" style="font-size:16px"></span></div>
                <div class="item"><div class="artist_pic last_fm_album_2"></div><span class="artist_name last_fm_album_2" style="font-size:16px"></span></div>
                <div class="item"><div class="artist_pic last_fm_album_3"></div><span class="artist_name last_fm_album_3" style="font-size: 16px;"></span></div>
                <div class="item"><div class="artist_pic last_fm_album_4"></div><span class="artist_name last_fm_album_4" style="font-size:16px"></span></div>
            </div> 
        </div>  

        <?php
        //header("Access-Control-Allow-Origin: *");
        $key = "rly_kool_key";

        $albums = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=salies&api_key=".$key);
        $artists = simplexml_load_file("http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=salies&api_key=".$key);

        $top_albums=array(
            ["name"=>$albums->topalbums->album[0]->name, "image"=>$albums->topalbums->album[0]->image[3]],
            ["name"=>$albums->topalbums->album[1]->name, "image"=>$albums->topalbums->album[1]->image[3]],
            ["name"=>$albums->topalbums->album[2]->name, "image"=>$albums->topalbums->album[2]->image[3]],
            ["name"=>$albums->topalbums->album[3]->name, "image"=>$albums->topalbums->album[3]->image[3]],
            ["name"=>$albums->topalbums->album[4]->name, "image"=>$albums->topalbums->album[4]->image[3]]
        );
        $albums_array=json_encode($top_albums);

        $top_artists=array(
            ["name"=>$artists->topartists->artist[0]->name, "image"=>$artists->topartists->artist[0]->image[3]],
            ["name"=>$artists->topartists->artist[1]->name, "image"=>$artists->topartists->artist[1]->image[3]],
            ["name"=>$artists->topartists->artist[2]->name, "image"=>$artists->topartists->artist[2]->image[3]],
            ["name"=>$artists->topartists->artist[3]->name, "image"=>$artists->topartists->artist[3]->image[3]],
            ["name"=>$artists->topartists->artist[4]->name, "image"=>$artists->topartists->artist[4]->image[3]]
        );
        $artists_array=json_encode($top_artists);

        echo "
        <script>
        var albums = $albums_array;
        var artists = $artists_array;
        for(i=0;i<albums.length;i++){
            var div = document.querySelector('div.last_fm_album_'+i);
            div.style.backgroundImage = 'url('+albums[i].image[0]+')';

            var span = document.querySelector('span.last_fm_album_'+i);
            span.innerHTML = (albums[i].name[0]);

            var div_a = document.querySelector('div.last_fm_artist_'+i);
            div_a.style.backgroundImage = 'url('+artists[i].image[0]+')';

            var span_a = document.querySelector('span.last_fm_artist_'+i);
            span_a.innerHTML = (artists[i].name[0]);
        };
        </script>
        ";
        ?>
        <footer>This page is an experiment made by <a href="https://git.saliesbox.com" style="color:#fff;text-decoration:none">Salies</a>.</footer>
    </div>
</body>
</html>