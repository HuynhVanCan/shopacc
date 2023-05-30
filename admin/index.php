<?php
require('../TMQ/function.php');
require('head.php');
$acc_sosinh = $db->query("SELECT * FROM `TMQ_nickthuong` WHERE `loai` = 'Nick Sơ Sinh' ")->fetch();
$acc_vip = $db->query("SELECT * FROM `TMQ_nickthuong` WHERE `loai` = 'Nick Vip' ")->fetch();
?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
               <label>Thống kê chung <a href="doi-mat-khau.html"><b style="color:red">Đổi mật khẩu</b></a></label> 
        <?php if($acc_vip["id"] == null){ ?>
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger"><i class="icon fa fa-ban"></i> Cảnh Báo</span>
                                     Acc vip nhận thưởng đã hết, vui lòng thêm acc <a href="" class="badge badge-pill badge-success">Thêm ACC</a>.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
        <?php }
        if($acc_sosinh["id"] == null){ ?>                            
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger"><i class="icon fa fa-ban"></i> Cảnh Báo</span>
                                     Acc sơ sinh nhận thưởng đã hết, vui lòng thêm acc <a href="" class="badge badge-pill badge-success">Thêm ACC</a>.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>  
        <?php } ?>                            
                <div class="row">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$doanhthu;?></span></div>
                                            <div class="stat-heading">Doanh thu</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$nickdaban;?></span></div>
                                            <div class="stat-heading">Đã bán acc</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$soacc;?></span></div>
                                            <div class="stat-heading">Tổng số acc</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$thanhvien;?></span></div>
                                            <div class="stat-heading">Thành viên</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                  <div class="row">
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-money"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$uoctinh;?></span></div>
                                            <div class="stat-heading">Doanh thu ước tính</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$napthe;?></span></div>
                                            <div class="stat-heading">Doanh thu nạp thẻ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$giaodich;?></span></div>
                                            <div class="stat-heading">Tổng số giao dịch</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$dichvu;?></span></div>
                                            <div class="stat-heading">Đơn hàng dịch vụ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                               <!-- Widgets  -->
               <label>Thống kê ngày</label> 
                <div class="row">
                    <?php $thoigian = date("d-m-Y"); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$doanhthu_ngay;?></span></div>
                                            <div class="stat-heading">Doanh thu</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$nick_ngay;?></span></div>
                                            <div class="stat-heading">Nick đã bán</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$soacc_ngay;?></span></div>
                                            <div class="stat-heading">Số account</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$user_ngay;?></span></div>
                                            <div class="stat-heading">Thành viên</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                  <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-credit-card"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$napthe_ngay;?></span></div>
                                            <div class="stat-heading">Doanh thu nạp thẻ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="ti-shopping-cart-full"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?=$giaodich_ngay;?></span></div>
                                            <div class="stat-heading">Giao dịch hôm nay</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                  
                </div>
                <!-- /Widgets -->
              
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Giao dịch gần đây </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                   
                                                    <th>Name</th>
                                                    <th>Loại nick</th>
                                                    <th>Giá tiền</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                        <?php
                        $get = $db->query("SELECT * FROM `TMQ_lichsu` ORDER BY time LIMIT 5");
                        foreach($get as $row){
                             $loainick = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '".$row['loainick']."'")->fetch();
                             $name_mua = $db->query("SELECT * FROM `TMQ_user` WHERE `uid` = '".$row['uid_mua']."'")->fetch();
                        ?>
                                                <tr>
                                                    <td class="serial"><?=$row['id'];?>.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="https://graph.facebook.com/<?=$row['uid_mua'];?>/picture?width=200&height=200" alt=""></a>
                                                        </div>
                                                    </td>
                                                    
                                                    <td><?=$name_mua['name'];?> </td>
                                                    <td><?=$loainick['ten'];?> </td>
                                                    <td><span class=" badge badge-complete count"><?=$row['giatien'];?></span></td>
                                                   
                                                </tr>
                                               <?php } ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    
                    </div>
                </div>
                <!-- /.orders -->
               
            <!-- /#add-category -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php require('end.php'); ?>