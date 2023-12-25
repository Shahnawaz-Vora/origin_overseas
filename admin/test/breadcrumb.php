<?php
    if (!isset($_COOKIE['adminId'])) {
        header("location: ../auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
?>
<div class="container">
    <div class="statbox widget box box-shadow">
        <div class="row widget-content widget-content-area layout-top-spacing signup-step-container">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-md-12 ">
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="<?php if($section == 'speaking') {echo 'active';} else{echo "";} ?>">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1 </span> <i class="step">Speaking</i></a>
                                    </li>
                                    <li role="presentation" class="disabled <?php if($section == 'writing') {echo 'active';} else{echo "";} ?>">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i class="step ">Writing</i></a>
                                    </li>
                                    <li role="presentation" class="disabled <?php if($section == 'reading') {echo 'active';} else{echo "";} ?>">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span> <i class="step ">Reading</i></a>
                                    </li>
                                    <li role="presentation" class="disabled <?php if($section == 'listening') {echo 'active';} else{echo "";} ?>">
                                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span> <i class="step ">Listening</i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>