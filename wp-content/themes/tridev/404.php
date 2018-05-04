<div class="page-not-found">
    <div class="container">

        <div class="row">
            <header>
                <title>
                    <?php
                    bloginfo('name');
                    echo " | ";
                    bloginfo('description');
                    ?>
                </title>
                <h2>ERROR 404</h2>
            </header>
            <div class="content404">
                <div class="desc">
                    <h3>It seems we can not find what you are looking for.</h3>
                </div>
                <a href="<?php echo get_site_url(); ?>" class="go-home">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<style>
    .page-not-found {
        padding: 20px;
        position: absolute;
    }
    header h2 {
        font-family: "GothamBlack";
        font-size: 36px;
        font-weight: normal;
        margin: 0;
        text-transform: uppercase;
        border-bottom: 3px solid;
    }
    .desc h3{
        color: #545454;
        font-family: "OpenSansRegular";
        font-size: 16px;
        line-height: 24px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .go-home {
        background-color: transparent;
        border: 3px solid #5eb4d3;
        color: #5eb4d3;
        float: left;
        font-family: "GothamBook";
        font-size: 24px;
        letter-spacing: 1.2px;
        margin: 8px 0 0 0px;
        text-decoration: none;
        padding: 10px;
    }
    .go-home:hover{
        text-decoration: none;
    }
</style>