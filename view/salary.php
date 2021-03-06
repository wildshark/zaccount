<?php
/**
 * Created by PhpStorm.
 * User: Andrew Quaye
 * Date: 02/09/2018
 * Time: 4:12 AM
 */
?>
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h5 class="title">Income Slip</h5>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" placeholder="" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Categories</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <?php income_categories($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>Ref#</label>
                            <input type="text" class="form-control" placeholder="" value="<?php echo "TI".rand();?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Details</label>
                            <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Pay type</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <?php payment_type($conn);?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" class="form-control" placeholder="0.00" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card card-user">
        <div class="image">
            <img src="assets/img/bg5.jpg" alt="...">
        </div>
        <div class="card-body">
            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="assets/img/mike.jpg" alt="...">
                    <h5 class="title">Mike Andrew</h5>
                </a>
                <p class="description">
                    michael24
                </p>
            </div>
            <p class="description text-center">
                "Lamborghini Mercy
                <br> Your chick she so thirsty
                <br> I'm in that two seat Lambo"
            </p>
        </div>
        <hr>
        <div class="button-container">
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-facebook-f"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-twitter"></i>
            </button>
            <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                <i class="fab fa-google-plus-g"></i>
            </button>
        </div>
    </div>
</div>