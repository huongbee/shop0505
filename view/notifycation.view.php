<section class="main-container col2-right-layout">
    <div class="main container">
        <?php
    if(isset($_SESSION['error'])):
    ?>
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </div>
        </div>
        <?php
    endif
    ?>
        <?php
    if(isset($_SESSION['success'])):
    ?>
        <div class="col-md-4 col-md-offset-4">
            <div class="alert alert-success  alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </div>
        </div>
        <?php
    endif
    ?>
    
    </div>
</section>