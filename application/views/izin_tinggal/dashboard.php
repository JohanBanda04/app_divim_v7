<?php
//$link1 = strtolower($this->uri->segment(1));
//$link2 = strtolower($this->uri->segment(2));
//$link3 = strtolower($this->uri->segment(3));
//$link4 = strtolower($this->uri->segment(4));
//$link4 = strtolower($this->uri->segment(5));
//$ceks    = $this->session->userdata('token_katamaran');


$ceks 	 = $this->session->userdata('token_katamaran');
$link1 = $this->uri->segment(1);
$link2 = $this->uri->segment(2);
$link3 = $this->uri->segment(3);
$link4 = $this->uri->segment(4);
$link5 = $this->uri->segment(5);
?>

<main class="main-content">

    <div id="mainContent" class="">

        <div class="col-lg-12 justify-content-center">
            <div class="row justify-content-center p-15">
                <h2 class="font-weight-bold" style="margin: 0 0 40px 0;">Izin Tinggal <?php echo $datazona['nama_panjang']??"Semua Pemda / Pemkot";?></h2>
            </div>

            <div class="row text-end">
                <div class="col-md-2">
                    <label class="ml-5 fw-500 float-left" style="vertical-align: middle; padding-top: 7px;" for="tanggal">Pilih Status</label>
                </div>
                <div class="col-md-2">
                    <!--link5 merupakan status-->
                    <select style="width: 170px; " class="form-control default-select2" id="stt"
                            onchange="window.location.href='izintinggal/data_itk/<?= $link3?>/id/'+this.value;">
                        <option value="semua" <?php if('semua'==$link5){ ?> selected <?php }?> >- Semua -</option>
                        <option value="belum_diproses" <?php if('belum_diproses'==$link5){echo "selected";} ?> >Belum diproses</option>
                        <option value="sedang_diproses" <?php if('sedang_diproses'==$link5){echo "selected";} ?> >Sedang Diproses</option>
                        <option value="selesai" <?php if('selesai'==$link5){echo "selected";} ?> >Selesai</option>
                    </select>

                </div>

                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <button type="button" class="float-right btn btn-success" data-toggle="modal"
                            data-target="#add_izin_tinggal">
                        <span class="bg-float"></span>
                        <span class="text">Tambah Data ITK</span>
                    </button>
                </div>

            </div>

        </div>

        <!--table beginning-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="thead-dark">
                        <tr>
                            <th width="1%" style="text-align: center">No.</th>
                            <th width="10%" style="text-align: center">Nama</th>
                            <th width="15%" style="text-align: center">Negara</th>
                            <th width="15%" style="text-align: center">Status</th>
                            <th width="15%" style="text-align: center">L / P</th>
                            <th width="15%" style="text-align: center">Paspor</th>
                            <th width="10%" style="text-align: center">Alamat</th>
                            <th width="10%" style="text-align: center">Penjamin</th>
                            <th width="15%" style="text-align: center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($izintinggal as $index => $dt) { ?>
                            <tr>
                                <td style="text-align: center"><?php echo $index + 1 ?></td>
                                <td style="text-align: center">
                                    <?php echo $dt['nama']; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $dt['negara']; ?>
                                </td>
                                <td style="text-align: center">

                                    <?php echo ucfirst(explode('_',$dt['status'])[0]??'').' ' .ucfirst(explode('_',$dt['status'])[1]??'')  ; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $dt['jenis_kelamin']; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $dt['no_paspor']; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $dt['alamat']; ?>
                                </td>
                                <td style="text-align: center">
                                    <?php echo $dt['penjamin']; ?>
                                </td>
                                <td class="" style="text-align: center">
                                    <div class="d-flex justify-content-center" style="text-align: center">
                                        <div class="" style="text-align: center; margin-left: 22px">
                                            <a href="" class="td-n c-blue-500 cH-blue-500 fsz-md p-5" data-toggle="modal" data-target="#detail_izin_tinggal<?php echo $dt['id']; ?>">
                                                <i class="ti-search"></i>
                                            </a>
                                        </div>
                                        <?php if (isset($ceks)) : ?>
                                            <div class="">
                                                <a href="" class="td-n c-deep-purple-500 cH-blue-500 fsz-md p-5" data-toggle="modal" data-target="#edit_izin_tinggal<?php echo $dt['id']; ?>">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="">
                                                <a href="" class="td-n c-red-500 cH-blue-500 fsz-md p-5" data-toggle="modal" data-target="#delete_izin_tinggal<?php echo $dt['id']; ?>">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add, Detail, Edit, Delete Bahan Berita  -->
            <?php

            // Add Bahan Berita
            $this->load->view('izin_tinggal/add_izin_tinggal');

            // Detail Bahan Berita
            $this->load->view('izin_tinggal/detail_izin_tinggal');

            // Edit Bahan Berita
            $this->load->view('izin_tinggal/edit_izin_tinggal');

            // Delete Bahan Berita
            $this->load->view('izin_tinggal/delete_izin_tinggal');

            ?>
        </div>
        <!--table ending-->
    </div>
</main>
<?php
session_start();
$ceks = $this->session->userdata('token_katamaran');
$link1 = $this->uri->segment(1);
$link2 = $this->uri->segment(2);
$link3 = $this->uri->segment(3);
$link4 = $this->uri->segment(4);
$link5 = $this->uri->segment(5);
$level = $this->session->userdata('level');

?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <?php

//            if ($_SESSION['token_katamaran']) {
//                echo "Terdapat data token : ".$_SESSION['token_katamaran'];
//            } else {
//                echo "Tidak Terdapat data token  ";
//            }
             ?>
            <div class="row fc-event-start justify-content-center" style="margin-left: 10px">
                <h2 class="font-weight-bold" style="margin: 0 0 40px 0; color: black; opacity: 70%">Dashboard</h2>

                <?php
                if($this->session->flashdata('msg')){
                    echo "<p>".$this->session->flashdata('msg')."</p>";
                }
                ?>
            </div>
            <div class="row">

                <?php if($_SESSION['token_katamaran']) { ?>
                    <div  class="col-md-4" style="margin-bottom: 10px">


                        <div class="layers p-20 "
                             style="border-radius: 20px; border-color: #490411; border-style: solid ;  border-width: 5px">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1" style="color: #373737">
                                    <!--ini data dari tabel 'zona' database api_divim-->
                                    Semua Data ITK
                                </h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <!--dashboard1-->
                                    <?php
                                    $id_for_all = 0;
                                    ?>

                                    <?php if($_SESSION['token_katamaran']){ ?>
                                        <a href="izintinggal/data_itk/<?php echo hashids_encrypt($id_for_all);?>">
                                        <span class="pull-left" style="font-weight: bold">
                                            Lihat Data Izin Tinggal
                                            <?php
                                            // echo $data['id'];
                                            ?>
                                        </span>
                                        </a>
                                    <?php }  ?>
                                    <div class="peer peer-greed">
                                        <canvas width="45" height="20"
                                                style="display: inline-block; width: 45px; height: 20px; vertical-align: top;">

                                        </canvas>
                                    </div>
                                    <div class="peer">

                                        <?php if($_SESSION['token_katamaran']){ ?>
                                            <span style=" background-color: #490411; color: #fcfaff"
                                                  class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15  ">
                                            <?php

                                            $dataITK_byZona = $this->Guzzle_model->getAllDataITK();
                                            echo count($dataITK_byZona)." Data ITK";
                                            ?>
                                        </span>
                                        <?php }  ?>


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                <?php } ?>


                <!--cara foreach data dari controller-->
                <?php foreach ($zona as $index => $data) {

                    ?>

                    <div <?php if($data['nama_zona']=="kasub_inteldakim"
                        || $data['nama_zona']=="superadmin" || $data['nama_zona']=="divim_kanwil"){
                        ?> hidden <?php
                    } ?> class="col-md-4" style="margin-bottom: 10px">


                        <div class="layers p-20 "
                             style="border-radius: 20px; border-color: <?= $data['warna_background']; ?>; border-style: solid ;  border-width: 5px">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1" style="color: #373737">
                                    <!--ini data dari tabel 'zona' database api_divim-->
                                    <?php echo $data['nama_panjang'] ; ?>
                                </h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <!--dashboard1-->

                                    <?php if($_SESSION['token_katamaran']){ ?>
                                        <a href="izintinggal/data_itk/<?= hashids_encrypt($data['id']);?>">
                                        <span class="pull-left" style="font-weight: bold">
                                            Lihat Data Izin Tinggal
                                            <?php
                                            // echo $data['id'];
                                            ?>
                                        </span>
                                        </a>
                                    <?php } else { ?>

                                        <button type="button" class="float-right btn_tambah" data-toggle="modal"
                                                data-target="#add_izin_tinggal<?php echo $data['id']; ?>">
                                            <span class="bg-float"></span>
                                            <span class="text">Tambah Data ITK</span>
                                        </button>
                                    <?php } ?>
                                    <div class="peer peer-greed">
                                        <canvas width="45" height="20"
                                                style="display: inline-block; width: 45px; height: 20px; vertical-align: top;">

                                        </canvas>
                                    </div>
                                    <div class="peer">


                                        <span style=" background-color: <?= $data['warna_background'] ?>; color: #fcfaff"
                                              class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15  ">
                                            <?php
                                            $dataITK_byZona = $this->Guzzle_model->getizintinggalByZona($data['id']);
                                            echo count($dataITK_byZona)." Data ITK";
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php
                } ?>


            </div>

            <!-- Add, Detail, Edit, Delete Agenda  -->
            <?php
            // Add Agenda
            //$this->load->view('agenda/add_agenda');
            //$this->load->view('kabupaten/izintinggal/add_izin_tinggal');
//
            $this->load->view('izin_tinggal/add_izin_tinggal');
//            // Detail Agenda
//            //$this->load->view('agenda/detail_agenda');
//            $this->load->view('izin_tinggal/detail_agenda');
//
//            //  Edit Agenda
//            //$this->load->view('agenda/edit_agenda');
//            $this->load->view('izin_tinggal/edit_agenda');
//
//            //  Delete Agenda
//            //$this->load->view('agenda/delete_agenda');
//            $this->load->view('izin_tinggal/delete_agenda');
//
//            //  Proses Agenda
//            //$this->load->view('agenda/proses_agenda');
//            $this->load->view('izin_tinggal/proses_agenda');
            ?>


        </div>
    </div>
</main>


