<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Xuất file</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Chốt đơn</p>
                                        <h3 class="rate-percentage">32.53%</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Ghé shop</p>
                                        <h3 class="rate-percentage">7,682</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Khách hàng mới</p>
                                        <h3 class="rate-percentage">104</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-4%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Thời gian ghé shop TB</p>
                                        <h3 class="rate-percentage">2.13 phút</h3>
                                        <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Doanh thu tháng</p>
                                        <h3 class="rate-percentage">31.42 tr</h3>
                                        <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-4.3%</span></p>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title"></p>
                                        <h3 class="rate-percentage"> </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Doanh thu tuần</h4>
                                                        <h5 class="card-subtitle card-subtitle-dash">Ghi nhận và so sánh tuần này và tuần trước đó</h5>
                                                    </div>
                                                    <div id="performance-line-legend"></div>
                                                </div>
                                                <div class="chartjs-wrapper mt-5">
                                                    <canvas id="performaneLine"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Trạng thái cửa hàng</h4>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <p class="status-summary-ight-white"></p>
                                                        <h2 class="text-info">Mở cửa</h2>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="">
                                                            <canvas style="height: 50px; width: 145px;" id="status-summary"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                                            <div class="circle-progress-width">
                                                                <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                                            </div>
                                                            <div>
                                                                <p class="text-small mb-2">Lợi nhuận</p>
                                                                <h4 class="mb-0 fw-bold">26.80%</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="circle-progress-width">
                                                                <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                                            </div>
                                                            <div>
                                                                <p class="text-small mb-2">Số đơn hàng</p>
                                                                <h4 class="mb-0 fw-bold">9065</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <h4 class="card-title card-title-dash">Nhật ký hoạt động</h4>
                                                    <p class="mb-0"></p>
                                                </div>
                                                <ul class="bullet-line-list">
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Hoài Phương</span> đã nhận hàng</div>
                                                            <p>Just now</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Hữu Lợi</span> đang giao</div>
                                                            <p>13m</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Trung Tín</span> xác nhận đơn</div>
                                                            <p>16m</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Duy Nguyện</span> đã đóng gói</div>
                                                            <p>27m</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Như Trung</span> đang giao</div>
                                                            <p>1h</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Bích Kiều</span> đã đóng gói</div>
                                                            <p>2h</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="d-flex justify-content-between">
                                                            <div><span class="text-light-green">Bá Đạt</span> đã nhận hàng</div>
                                                            <p>2h</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="list align-items-center pt-3">
                                                    <div class="wrapper w-100">
                                                        <p class="mb-0">
                                                            <a href="#" class="fw-bold text-primary">Xem tất cả <i class="mdi mdi-arrow-right ms-2"></i></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-8 grid-margin stretch-card">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->