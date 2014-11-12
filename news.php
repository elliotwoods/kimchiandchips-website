<?
$isLive = true;
?>
<? require("defaults.php"); ?>
<?
$newsString = file_get_contents("./news/main.json");
$newsJson = json_decode($newsString, true);
$newsItems = $newsJson["news"];
?>
<!DOCTYPE html>  
<html lang="en">  
    <head>
<? require("header.php"); ?>
        <link rel="stylesheet" type="text/css" href="news.css">
    </head>  
    <body>
        <div id="main">
        
<? require("navigationBar.php"); ?>
            
            <div class="newsHolder">
<?
$newsItemIndex = 0;
foreach($newsItems as $newsItem) {
    $odd = $newsItemIndex % 2 == 1;
    $class = $odd ? "newsItemOdd" : "newsItemEven";
?>
                <div class="newsItem <?= $class ?>">
                    <img class="newsImage" src="news/<?= $newsItem["image"] ?>" />
                    <div class="newsTextBlock">
                        <span class="newsDate">
                            <?= $newsItem["date"] ?>
                        </span>
                        <br />
                        <span class="newsTitle">
                            <?= $newsItem["title"] ?>
                        </span>
                        <br />
<?
    foreach($newsItem["brief"] as $paragraph) {
?>
                        <p>
                            <?= $paragraph ?>
                        </p>
<?
    }
    if (!is_null($newsItem["place"])) {
?>
                        <p>
                            Place : <?= $newsItem["place"] ?>
                        </p>
<?
    }
    if (!is_null($newsItem["moreInfo"])) {
        $moreInfoURLS = $newsItem["moreInfo"];
        if (!is_array($moreInfoURLS)) {
            $moreInfoURLS = array($moreInfoURLS);
        }
?>
                        <p>
                            More info :
<?
        foreach($moreInfoURLS as $moreInfoURL) {
?>
<a href="<?= $moreInfoURL ?>" target="_blank"><?= shortenText($moreInfoURL, 50) ?></a><br />
<?
        }
    }
?>
                    </div>
                </div>
<?
    $newsItemIndex++;
}
?>
            </div>

            <div class="footer">
            	KIMCHI and CHIPS
            </div>
        </div>
    </body>
</html>
