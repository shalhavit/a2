<?php require('php/getTweetEngine.php'); ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tweet Inspector | DWA15 Assignment 2</title>

        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css'>
        <link rel='stylesheet' href='css/custom.css'>

    </head>

    <body id="home">
        <div class="content row">
            <?php include "php/header.php";?>
        </div> <!-- header -->
        <section class="container">
            <div class="content row">

                <div class="sidebar col col-lg-3">
                    <form method="GET">
                        <h2 class="text-center">Search user</h2>
                        <div class="extra_padding_all">
                            <label for="filter">User:</label>
                            <input type="text" name="filter" id="filter" value="<?=sanitize($filter) ?>">
                        </div>

                        <div class="col col-lg-12 extra_padding">
                            <label for='numTweets'>Max. number of tweets:</label>

                            <select name='numTweets' id='numTweets'>
                                <option value='choose'>Choose one...</option>
                                <option value='1' <?php if($numTweets == '1') echo 'SELECTED'?>>1</option>
                                <option value='2' <?php if($numTweets == '2') echo 'SELECTED'?>>2</option>
                                <option value='3' <?php if($numTweets == '3') echo 'SELECTED'?>>3</option>
                                <option value='4' <?php if($numTweets == '4') echo 'SELECTED'?>>4</option>
                                <option value='5' <?php if($numTweets == '5') echo 'SELECTED'?>>5</option>
                                <option value='6' <?php if($numTweets == '6') echo 'SELECTED'?>>6</option>
                                <option value='7' <?php if($numTweets == '7') echo 'SELECTED'?>>7</option>
                                <option value='8' <?php if($numTweets == '8') echo 'SELECTED'?>>8</option>
                                <option value='9' <?php if($numTweets == '9') echo 'SELECTED'?>>9</option>
                                <option value='10' <?php if($numTweets == '10') echo 'SELECTED'?>>10</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-lg btn-primary" value="Search user">
                        </div>
                    </form>

                    <hr/>

                    <div class="col col-lg-12 text-center">
                        <br/>
                        <?php if (!$valid): ?>
                            <p class="text-center alert alert-danger extra_padding_all" role="alert">
                                Number of tweets outside range :: Using default (<?=$numTweets?>)
                            </p>
                        <?php endif; ?>
                    </div>
                </div> <!-- sidebar -->

                <section class="main col col-lg-9">
                    <h2 class="text-center">Last week tweets timeline</h2>
                    <div class="row">

                        <?php if ($filter): ?>
                            <h3 class="text-center alert <?=$alertType?>">
                                <?=$labelResponse ?>
                            </h3>

                            <?php foreach ($arrayUserTimeline as $tstatus => $tweet): ?>
                                <div>
                                    <h6 class="small text-success"><?=$tweet['created_at']?></h6>
                                    <?php
                                    if (isset($tweet['entities']['media'])) {
                                        $mediaURL = $tweet['entities']['media'][0]['media_url'];
                                        echo "<img class='img-rounded img_b_padding' src='{$mediaURL}' alt='Twitter thumb' style='width:100px' />";
                                    }
                                    ?>

                                    <p class="text-info"><?=$tweet['text']?></p>
                                    <hr/>
                                </div>
                            <?php endforeach; ?>

                        <?php else: ?>
                            <?php foreach ($arrayUserTimeline as $publish => $tweet): ?>
                                <div>
                                    <h4><?=$tweet['user']['name']?></h4>
                                    <h6 class="small text-success"><?=$tweet['created_at']?></h6>
                                    <?php
                                    if (isset($tweet['entities']['media'])) {
                                        $mediaURL = $tweet['entities']['media'][0]['media_url'];
                                        echo "<img class='img-rounded img_b_padding' src='{$mediaURL}'  alt='Twitter thumb' style='width:100px' />";
                                    }
                                    ?>
                                    <p class="text-info"><?=$tweet['text']?></p>
                                    <hr/>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </section> <!-- main -->

            </div> <!-- content -->

        </section> <!-- container -->

        <div class="content row">
            <?php include "php/footer.php";?>
        </div> <!-- Footer -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
