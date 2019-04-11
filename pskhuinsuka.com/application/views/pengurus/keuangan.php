<?php
    $debet = $kredit = $saldo = 0;
    if (!empty($data["list_keuangan"])) {
        foreach($data["list_keuangan"] as $daftar){
            if($daftar["keuangan_keterangan"] === "1") {
                $debet = $debet+$daftar["keuangan_nominal"];
            } else {
                $kredit = $kredit+$daftar["keuangan_nominal"];
            }
        }
    }
   $saldoTotal = $debet - $kredit;
?>




<!doctype html>
<html class="no-js h-100" lang="en">
	<head>
        <?php $this->load->view("pengurus/_partials/head.php") ?>

        <!-- CSS for this page -->
        <style type="text/css">
            a,
            a.custom-card,
            a.custom-card:hover {
                color: inherit;
                text-decoration: none;
            }

            .panel
            {
                -webkit-transition: 0.1s ease-in-out;
                -moz-transition: 0.1s ease-in-out;
                -o-transition: 0.1s ease-in-out;
                transition: 0.1s ease-in-out;
            }

            .hover-effect:hover
            {
                -webkit-transform: scale(1.06);
                -moz-transform: scale(1.06);
                -o-transform: scale(1.06);
                -ms-transform: scale(1.06);
                transform: scale(1.06);
            }

                        
            .card-hover .info {
                visibility: hidden;
                opacity: 0;
                height: 0;
                padding: 0;
            }

            .card-hover:hover .info {
                height: 100%;
                visibility: visible;
                opacity: 10;
                padding: 5px;
                transition: opacity 0.001s ease;
            }

            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none; 
            }

            input[type=number] {
                -moz-appearance: textfield;
            }

            .table td {
                vertical-align : middle;
            }

            tbody tr:hover {
                background-color: #fbfbfb;
                color: #007bff;
                box-shadow: inset .1875rem 0 0 #007bff;
                will-change: background-color,box-shadow,color;
                transition: box-shadow .2s ease,color .2s ease,background-color .2s ease;
            }
        </style>
    
    </head>
	<body class="h-100">

		<div class="container-fluid">
			<div class="row">
				<!-- sidebar -->
                <?php $this->load->view("pengurus/_partials/sidebar.php") ?>
				
                <!-- //sidebar -->

				<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
					<!-- navbar -->
                    <?php $this->load->view("pengurus/_partials/navbar.php") ?>

                    <!-- /navbar -->

					<div class="main-content-container container-fluid px-4">
                        <!-- header -->
                        <?php $this->load->view("pengurus/_partials/header.php") ?>
                        
                        <!-- //header -->

                        <!-- field -->
                        <!-- Small Stats Blocks -->
						<div class="row">
							<div class="col-lg col-md-6 col-sm-6 mb-4">
                                <a href="#modalPemasukan" data-toggle="modal" data-target="#modalPemasukan" class="custom-card">
                                    <div class="stats-small stats-small--1 card card-small panel card-hover hover-effect">
                                        <div class="card-body p-0 d-flex">
                                            <div class="d-flex flex-column m-auto">
                                                <div class="stats-small__data text-center">
                                                    <span class="stats-small__label text-uppercase">Pemasukan</span>
                                                    <h6 class="stats-small__value count my-3"><?= "Rp" . number_format($debet,2,',','.'); ?></h6>
                                                </div>
                                                <div class="info btn btn-primary text-center">
                                                    Tambah Pemasukan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
							<div class="col-lg col-md-6 col-sm-6 mb-4">
                                <a href="#modalPengeluaran" data-toggle="modal" data-target="#modalPengeluaran" class="custom-card">
                                    <div class="stats-small stats-small--1 card card-small panel card-hover hover-effect">
                                        <div class="card-body p-0 d-flex">
                                            <div class="d-flex flex-column m-auto">
                                                <div class="stats-small__data text-center">
                                                    <span class="stats-small__label text-uppercase">Pengeluaran</span>
                                                    <h6 class="stats-small__value count my-3"><?= "Rp" . number_format($kredit,2,',','.'); ?></h6>
                                                </div>
                                                <div class="info btn btn-primary text-center">
                                                    Tambah Pengeluaran
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
							</div>
							<div class="col-lg col-md-4 col-sm-6 mb-4">
								<div class="stats-small stats-small--1 card card-small">
									<div class="card-body p-0 d-flex">
										<div class="d-flex flex-column m-auto">
											<div class="stats-small__data text-center">
												<span class="stats-small__label text-uppercase">Saldo</span>
												<h6 class="stats-small__value count my-3"><?= "Rp" . number_format($saldoTotal,2,',','.'); ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <!-- End Small Stats Blocks -->
                        <!-- Default Light Table -->
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header border-bottom">
                                        <h6 class="m-0">Laporan Keuangan</h6>
                                    </div>
                                    <div class="card-body p-0 pb-4 text-center">
                                        <div class="row text-center p-3">
                                            <div class="col">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <select id="periode" class="form-control">
                                                        <?php
                                                            for ($i=0; $i<count($data["list_periode"]); $i++) {
                                                                if ($i === count($data["list_periode"])-1) {
                                                                    $selected = " selected";
                                                                }
                                                                else {
                                                                    $selected = "";
                                                                }

                                                                echo "<option value=\"".$data["list_periode"][$i]["periode_id"]."\"".$selected.">".@str_replace("-", "/", $data["list_periode"][$i]["periode_keterangan"])."</option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <select id="bulan" class="form-control" <?= !empty($data["list_bulan"]) ? "" : " disabled" ?>>
                                                        <?php
                                                        if(!empty($data["list_bulan"])){
                                                            for ($i=0; $i<count($data["list_bulan"]); $i++) {
                                                                if ($data["list_bulan"][$i]["bulan_id"] === date('n')) {
                                                                    $selected = " selected";
                                                                }
                                                                else {
                                                                    $selected = "";
                                                                }

                                                                if (!empty($data["list_bulan"][$i+1]["bulan_id"]) && $data["list_bulan"][$i]["bulan_id"] !== $data["list_bulan"][$i+1]["bulan_id"]  ) {
                                                                    echo "<option value=\"".$data["list_bulan"][$i]["bulan_id"]."\"".$selected.">".$data["list_bulan"][$i]["bulan_keterangan"]."</option>";
                                                                }
                                                                else if (!empty($data["list_bulan"][$i]["bulan_id"]) && empty($data["list_bulan"][$i+1]["bulan_id"]) ) {
                                                                    echo "<option value=\"".$data["list_bulan"][$i]["bulan_id"]."\"".$selected.">".$data["list_bulan"][$i]["bulan_keterangan"]."</option>";
                                                                }
                                                            } 
                                                        } else {
                                                            echo "<option value=\"\">Bulan tidak ditemukan.</option>";
                                                        } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4 text-right">
                                                        <a href="<?= base() ?>" class="btn btn-primary" style="text_decoration:none; color: white"><i class="fas fa-download fa-md text-white-50"></i> Cetak Laporan</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered table-hover mb-4" id="table"<?= !empty($data["list_keuangan"]) ? "" : " hidden"?>>
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="border-0">Tanggal</th>
                                                    <th scope="col" class="border-0">Keterangan</th>
                                                    <th scope="col" class="border-0">Qty</th>
                                                    <th scope="col" class="border-0">Debet</th>
                                                    <th scope="col" class="border-0">Kredit</th>
                                                    <th scope="col" class="border-0">Saldo</th>
                                                    <th scope="col" class="border-0">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            if (!empty($data["list_keuangan"])) {
                                            foreach($data["list_keuangan"] as $daftar) :  ?>
                                                <tr id="<?= $daftar['keuangan_id']; ?>">
                                                    <td><?= date("d/m/Y", strtotime($daftar["keuangan_tanggal"])); ?></td>
                                                    <td><?= $daftar["keuangan_judul"]; ?></td>
                                                    <td><?= $daftar["keuangan_jumlah"]; ?></td>
                                                    
                                                    <?php if($daftar["keuangan_keterangan"] === "1") { ?>
                                                    <td><?= "Rp" . number_format($daftar["keuangan_nominal"],2,',','.'); ?></td>
                                                    <td></td><?php } else { ?>
                                                    <td></td>
                                                    <td><?= "Rp" . number_format($daftar["keuangan_nominal"],2,',','.'); ?></td>
                                                    <?php }?>
                                                    <?php $saldo = $debet-$kredit; ?>
                                                    <td><?= "Rp" . number_format($saldo,2,',','.'); ?></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#editData-<?= $daftar["keuangan_id"]; ?>" class="btn btn-sm btn-outline-info mr-1">
                                                            <i class="fas fa-pencil-alt mr-1"></i>Sunting
                                                        </button>
                                                        <button onclick="hapus(<?= $daftar['keuangan_id']; ?>)" class="btn btn-sm btn-outline-danger mr-1">
                                                            <i class="fas fa-trash-alt mr-1"></i>Hapus
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; }?>
                                            </tbody>
                                            <tfoot class="bg bg-light">
                                                <tr>
                                                    <th colspan="3">Total</th>
                                                    <th><?= "Rp" . number_format($debet,2,',','.'); ?></th>
                                                    <th><?= "Rp" . number_format($kredit,2,',','.'); ?></th>
                                                    <th colspan="2"><?= "Rp" . number_format($saldoTotal,2,',','.'); ?></th>
                                                </tr>
                                            </tfoot>

                                            <div id="keterangan" class="row"<?= !empty($data["list_keuangan"]) ? " hidden" : "" ?>>
                                                <div class="col-md-12 text-center pt-3">
                                                    <label>Laporan keuangan tidak ditemukan.</label>
                                                </div>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Default Light Table -->
						<!-- //field -->	
                    </div>
                    
                    <!-- footer -->
                    <?php $this->load->view("pengurus/_partials/footer.php") ?>
					
                    <!-- //footer -->
				</main>
			</div>
        </div>

        <!-- Modal -->
        <!-- modal for pemasukan -->
        <div class="modal fade" id="modalPemasukan" tabindex="-1" role="dialog" aria-labelledby="modalPemasukan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPemasukan">Tambah Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengurus/keuangan/').'tambah' ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="priode" name="periode" value="<?= $data["list_periode"][count($data["list_periode"])-1]["periode_id"]; ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="jenisData" name="jenisData" value="1">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal (Rp.)</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submitPemasukan">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- end of modal for pemasukan -->

        <!-- modal for pengeluaran -->
        <div class="modal fade" id="modalPengeluaran" tabindex="-1" role="dialog" aria-labelledby="modalPengeluaran" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengeluaran">Tambah Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengurus/keuangan/').'tambah' ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="priode" name="periode" value="<?= $data["list_periode"][count($data["list_periode"])-1]["periode_id"]; ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="jenisData" name="jenisData" value="2">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal (Rp.)</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submitPemasukan">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- end of modal for pengeluaran -->

        <!-- modal for edit -->
        <?php 
        if (!empty($data["list_keuangan"])) {
        foreach($data["list_keuangan"] as $daftar) :  ?>
        <div class="modal fade" id="editData-<?= $daftar['keuangan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editData" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editData">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pengurus/keuangan/ubah') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $daftar['keuangan_id'] ?>">
                        <input type="hidden" class="form-control" id="id" name="periode" value="<?= $daftar['keuangan_periode'] ?>">
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?= date("d/m/Y", strtotime($daftar["keuangan_tanggal"])); ?>" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                        <div class="form-group col-6">
                            <label for="qty">Qty</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="<?= $daftar['keuangan_jumlah'] ?>" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $daftar['keuangan_judul'] ?>" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="jenisData" name="jenisData" value="<?= $daftar['keuangan_keterangan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal (Rp.)</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" value="<?= $daftar['keuangan_nominal'] ?>" required oninvalid="this.setCustomValidity('tidak boleh dikosongkan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submitPemasukan">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach; 
        }?>
        <!-- end of modal for edit -->

        <!-- end of modal -->

        <!-- javascript -->
        <?php $this->load->view("pengurus/_partials/javascript.php") ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <!-- //javascript -->
        <script type="text/javascript">
            var site_api = `<?= $api ?>`;

            $(document).ready(function () {
                $('#tanggal,#tanggalPengeluaran').datepicker({
                    format: "dd/mm/yyyy",
                    autoclose:true
                });

                var periode = $("#periode").val();
                var bulan   = $("#bulan").val();
                $.ajax({
                    url     : site_api + "/keuangan/" + periode + "/" + bulan,
                    dataType: "json",
                    type    : "GET",
                    success: function(response) {
                        var daftar = response.keterangan;
                        // if (response.status === 200) {
                        //     $("#table").removeAttr("hidden");
                        //     $("#keterangan").attr("hidden", "true");
                        //     $("#table tbody").empty();
                        //     for (const index in daftar) {
                        //         var date    = new Date(daftar[index].keuangan_tanggal),
                        //             year    = date.getFullYear(),
                        //             newMonth= date.getMonth()+1,
                        //             month   = date.getMonth() < 10 ? '0' + newMonth : date.getMonth(),
                        //             day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
                        //             newDate = day + '/' + month + '/' + year;

                        //         $("#table tbody").append(`
                        //         <tr>
                        //             <td>`+ newDate +`</td>
                        //             <td>`+ daftar[index].keuangan_judul +`</td>
                        //             <td>`+ daftar[index].keuangan_jumlah +`</td>`
                        //             +(daftar[index].keuangan_keterangan == 1 ? `<td>`+ daftar[index].keuangan_nominal +`</td><td></td>` : `<td></td><td>`+ daftar[index].keuangan_nominal +`</td>`)+`
                        //             <td>`+ "tes" +`</td>
                        //             <td>`+ "tes" +`</td>
                        //         </tr>
                        //         `);
                        //     }
                        // } else {
                        //     $("#table").attr("hidden", "true");
                        //     $("#keterangan").removeAttr("hidden");
                        // }
                    }
                });

                $("#periode").change(function(){
                    var periode = $('#periode').val();
                    
                    $.ajax({
                        url     : site_api + "/keuangan/bulan/" + periode,
                        dataType: "json",
                        type    : "GET",
                        success : function(response) {
                            var bulan = response.keterangan;
                            if (response.status === 200) {
                                $("#bulan").removeAttr("disabled");
                                $("#bulan").empty();
                                $("#bulan").append(new Option("Pilih..."));
                                for (const index in bulan) {
                                    var option = new Option(bulan[index].bulan_keterangan, bulan[index].bulan_id);
                                    $("#bulan").append(option);
                                }
                            } else {
                                $("#bulan").attr("disabled", "true");
                                $("#bulan").empty();
                                $("#bulan").append(new Option("Bulan tidak ditemukan."))
                            }
                        },
                        error : function (jqXHR, exception) {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (Verify Network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                });

                $("#bulan").change(function () {
                    var periode = $("#periode").val();
                    var bulan   = $("#bulan").val();
                    
                    $.ajax({
                        url     : site_api + "/keuangan/" + periode + "/" + bulan,
                        dataType: "json",
                        type    : "GET",
                        success : function(response) {
                            var daftar = response.keterangan;
                            if (response.status === 200) {
                                $("#table").removeAttr("hidden");
                                $("#keterangan").attr("hidden", "true");
                                $("#table tbody").empty();
                                // $("#table tbody").append(`
                                // <tr>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                //     <td>`+ "tes" +`</td>
                                // </tr>
                                // `);
                                for (const index in daftar) {
                                    var date    = new Date(daftar[index].keuangan_tanggal),
                                        year    = date.getFullYear(),
                                        newMonth= date.getMonth()+1,
                                        month   = date.getMonth() < 10 ? '0' + newMonth : date.getMonth(),
                                        day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate(),
                                        newDate = day + '/' + month + '/' + year;
                                    if (periode === `<?= $data["list_periode"][count($data["list_periode"])-1]["periode_id"]; ?>`) {
                                        var tombol = `<td>
                                                <button data-toggle="modal" data-target="#editData-<?= $daftar["keuangan_id"]; ?>" class="btn btn-sm btn-outline-info mr-1">
                                                    <i class="fas fa-pencil-alt mr-1"></i>Sunting
                                                </button>
                                                <button onclick="hapus(<?= $daftar['keuangan_id']; ?>)" class="btn btn-sm btn-outline-danger mr-1">
                                                    <i class="fas fa-trash-alt mr-1"></i>Hapus
                                                </button>
                                            </td>`;
                                    } else {
                                        var tombol = `-`;
                                    }

                                    $("#table tbody").append(`
                                    <tr>
                                        <td>`+ newDate +`</td>
                                        <td>`+ daftar[index].keuangan_judul +`</td>
                                        <td>`+ daftar[index].keuangan_jumlah +`</td>`
                                        +(daftar[index].keuangan_keterangan == 1 ? `<td>`+ daftar[index].keuangan_nominal +`</td><td></td>` : `<td></td><td>`+ daftar[index].keuangan_nominal +`</td>`)+`
                                        <td>`+ "tes" +`</td>
                                        <td>`+tombol+`</td>
                                    </tr>
                                    `);
                                }
                            } else {
                                $("#table").attr("hidden", "true");
                                $("#keterangan").removeAttr("hidden");
                            }
                        },
                        error : function (jqXHR, exception) {
                            $("#table").attr("hidden", "true");
                            $("#keterangan").removeAttr("hidden");

                            if (jqXHR.status === 0) {
                                keterangan = "Not connect (Verify Network).";
                            } else if (jqXHR.status == 404) {
                                keterangan = "Requested page not found.";
                            } else if (jqXHR.status == 500) {
                                keterangan = "Internal Server Error.";
                            } else if (exception === "parsererror") {
                                keterangan = "Requested JSON parse failed.";
                            } else if (exception === "timeout") {
                                keterangan = "Time out error.";
                            } else if (exception === "abort") {
                                keterangan = "Ajax request aborted.";
                            } else {
                                keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                            }
                            $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-info mx-2"></i>
                                <strong>`+keterangan+`</strong>
                            </div>`);
                        }
                    });
                });
            });

            function hapus(id) {
                $("#"+id).addClass("focus");

                swal.fire({
                    title: "Apakah anda yakin?",
                    text: "Menghapus data ini secara permanen.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                })
                .then((yes) => {
                    if (yes.value) {
                        $.ajax({
					        url: site_api+"/keuangan/hapus/"+id,
                            dataType: "json",
                            type: "GET",
                            success: function(response) {
                                if (response.status === 200) {
                                    swal.fire({
                                        title: "Data Berhasil dihapus.",
                                        type: "success",
                                    });

                                    $("#"+id).closest("tr").remove();
                                } else {
                                    swal({
                                        title: "Data gagal dihapus.",
                                        text: response.keterangan,
                                        type: "error",
                                        showCancelButton: true,
                                    });

                                    $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                        <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <i class="fa fa-info mx-2"></i>
                                        <strong>`+response.keterangan+`</strong>
                                    </div>`);

                                    $("#"+id).removeClass("focus");
                                }
                            },
                            error: function (jqXHR, exception) {
                                if (jqXHR.status === 0) {
                                    keterangan = "Not connect (verify network).";
                                } else if (jqXHR.status == 404) {
                                    keterangan = "Requested page not found.";
                                } else if (jqXHR.status == 500) {
                                    keterangan = "Internal Server Error.";
                                } else if (exception === "parsererror") {
                                    keterangan = "Requested JSON parse failed.";
                                } else if (exception === "timeout") {
                                    keterangan = "Time out error.";
                                } else if (exception === "abort") {
                                    keterangan = "Ajax request aborted.";
                                } else {
                                    keterangan = "Uncaught Error ("+jqXHR.responseText+").";
                                }
                                $("#status").html(`<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                    <button type="button" class="close mt-1" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-info mx-2"></i>
                                    <strong>`+keterangan+`</strong>
                                </div>`);

                                $("#"+id).removeClass("focus");
                            }
                        });
                    }
                    else {
                        $("#"+id).removeClass("focus");
                    }
                })
            }
        </script>
	</body>
</html>