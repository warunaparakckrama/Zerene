<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo CSS?>searchbar.css">
    </head>
    <body>
        <div class="grid-search-2">
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit" class="button"><img src="<?php echo IMG;?>search.svg" alt="search" class="btn-icon"></button>
                </form>
            </div>
                
            <a href="#" class="notify">
                <button class="button"><img src="<?php echo IMG;?>bell.svg" alt="notify" class="btn-icon"></button>
            </a>

            <a href="#" class="notify">
                <button class="button"><img src="<?php echo IMG;?>chat.svg" alt="notify" class="btn-icon"></button>
            </a>
        </div>
    </body>
</html>