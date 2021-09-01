<!--  -->

<div class="container pt-5">
    <div class="row mt-5" style="width: 100%;margin: 0 auto;" >
        <div class="row">
            <?php
                foreach ($arr as $key => $value) {
                    echo <<< TR
                        <div class="col-md-6 col-xl-3 mb-4">
                            <a href="{$value['link']}" style="text-decoration: none;" >
                                <div class="card shadow border-start-primary py-2">
                                    <div class="card-body"  style='height:150px'>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col me-2">
                                                <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>{$key}</span></div>
                                                <div class="text-dark fw-bold h5 mb-0"><span>Number of {$key} <span style="color: red;">{$value['num']}</span></span></div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    TR;
                }
            ?>

        </div>
    </div>
</div>

<div class="row">


</div>

<!--  -->